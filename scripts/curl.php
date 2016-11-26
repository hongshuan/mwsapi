<?php
//Functions from Athena:
/**
 * Get url or send POST data
 *
 * @param string $url
 * @param array  $param['Header']
 *               $param['Post']
 * @return array $return['ok'] 1  - success, (0,-1) - fail
 *               $return['body']  - response
 *               $return['error'] - error, if "ok" is not 1
 *               $return['head']  - http header
 */
function fetchURL($url, $param) // curlGet/curlPost
{
    $return = array();

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    if (!empty($param)) {
        if (!empty($param['Header'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $param['Header']);
        }
        if (!empty($param['Post'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param['Post']);
        }
    }

    $data = curl_exec($ch);
    if (curl_errno($ch)) {
        $return['ok'] = -1;
        $return['error'] = curl_error($ch);
        return $return;
    }

    if (is_numeric(strpos($data, 'HTTP/1.1 100 Continue'))) {
        $data = str_replace('HTTP/1.1 100 Continue', '', $data);
    }

    $data = preg_split("/\r\n\r\n/",$data, 2, PREG_SPLIT_NO_EMPTY);

    if (!empty($data)) {
        $return['head'] = (isset($data[0]) ? $data[0] : null);
        $return['body'] = (isset($data[1]) ? $data[1] : null);
    } else {
        $return['head'] = null;
        $return['body'] = null;
    }

    $matches = array();
    $data = preg_match("/HTTP\/[0-9.]+ ([0-9]+) (.+)\r\n/",$return['head'], $matches);

    if (!empty($matches)) {
        $return['code'] = $matches[1];
        $return['answer'] = $matches[2];
    }

    $data = preg_match("/meta http-equiv=.refresh. +content=.[0-9]*;url=([^'\"]*)/i",
            $return['body'], $matches);

    if (!empty($matches)) {
        $return['location'] = $matches[1];
        $return['code'] = '301';
    }

    if ($return['code'] == '200' || $return['code'] == '302') {
        $return['ok'] = 1;
    } else {
        $return['error'] = (($return['answer'] and $return['answer'] != 'OK')
                         ? $return['answer'] : 'Something wrong!');
        $return['ok'] = 0;
    }

    foreach (preg_split('/\n/', $return['head'], -1, PREG_SPLIT_NO_EMPTY) as $value) {
        $data = preg_split('/:/', $value, 2, PREG_SPLIT_NO_EMPTY);
        if (is_array($data) and isset($data['1'])) {
            $return['headarray'][$data['0']] = trim($data['1']);
        }
    }

    curl_close($ch);

    return $return;
}
// End Functions from Athena

/**
 * Sends a request to Amazon via cURL
 *
 * This method will keep trying if the request was throttled.
 * @param string $url <p>URL to feed to cURL</p>
 * @param array $param <p>parameter array to feed to cURL</p>
 * @return array cURL response array
 */
protected function sendRequest($url, $param)
{
    $this->log("Making request to Amazon: ".$this->options['Action']);

    $response = $this->fetchURL($url, $param);

    while ($response['code'] == '503' && $this->throttleStop == false) {
        $this->sleep();
        $response = $this->fetchURL($url, $param);
    }

    $this->rawResponses[] = $response;

    return $response;
}

/**
 * Checks whether or not the response is OK.
 * 
 * Verifies whether or not the HTTP response has the 200 OK code. If the code
 * is not 200, the incident and error message returned are logged.
 * @param array $r <p>The HTTP response array. Expects the array to have
 * the fields <i>code</i>, <i>body</i>, and <i>error</i>.</p>
 * @return boolean <b>TRUE</b> if the status is 200 OK, <b>FALSE</b> otherwise.
 */
protected function checkResponse($r)
{
    if (!is_array($r) || !array_key_exists('code', $r)) {
        $this->log("No Response found",'Warning');
        return false;
    }

    if ($r['code'] == 200){
        return true;
    } else {
        $xml = simplexml_load_string($r['body'])->Error;
        $this->log("Bad Response! ".$r['code']." ".$r['error'].": ".
            $xml->Code." - ".$xml->Message,'Urgent');
        return false;
    }
}

/**
 * Gives the response code from the last response.
 * This data can also be found in the array given by getLastResponse.
 * @return string|int standard REST response code (200, 404, etc.) or <b>NULL</b> if no response
 * @see getLastResponse
 */
public function getLastResponseCode() {
    $last = $this->getLastResponse();
    if (!empty($last['code'])) {
        return $last['code'];
    }
}

/**
 * Gives the last response with an error code.
 * This may or may not be the same as the last response if multiple requests were made.
 * @return array associative array of HTTP response or <b>NULL</b> if no error response yet
 * @see getLastResponse
 */
public function getLastErrorResponse() {
    if (!empty($this->rawResponses)) {
        foreach (array_reverse($this->rawResponses) as $x) {
            if (isset($x['error'])) {
                return $x;
            }
        }
    }
}

/**
 * Gives the Amazon error code from the last error response.
 * The error code uses words rather than numbers. (Ex: "InvalidParameterValue")
 * This data can also be found in the XML body given by getLastErrorResponse.
 * @return string Amazon error code or <b>NULL</b> if not set yet or no error response yet
 * @see getLastErrorResponse
 */
public function getLastErrorCode() {
    $last = $this->getLastErrorResponse();
    if (!empty($last['body'])) {
        $xml = simplexml_load_string($last['body']);
        if (isset($xml->Error->Code)) {
            return $xml->Error->Code;
        }
    }
}

/**
 * Gives the error message from the last error response.
 * Not all error responses will have error messages.
 * This data can also be found in the XML body given by getLastErrorResponse.
 * @return string Amazon error code or <b>NULL</b> if not set yet or no error response yet
 * @see getLastErrorResponse
 */
public function getLastErrorMessage() {
    $last = $this->getLastErrorResponse();
    if (!empty($last['body'])) {
        $xml = simplexml_load_string($last['body']);
        if (isset($xml->Error->Message)) {
            return $xml->Error->Message;
        }
    }
}

