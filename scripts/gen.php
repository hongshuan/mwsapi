<?php

const EOL = "\n";
const DEBUG = false;

$json = json_decode(file_get_contents(__DIR__ . '/mws-api.json'));

foreach($json as $key => $val) {
#   echo $key, ' ';
#   echo $val->Name, ' ';
#   echo 'VERSION=', $val->Version, ' ';
#   echo EOL;

    if ($key == 'Feeds') {
        genClass('Feeds', $val);
        genConstruct();
        foreach($val->Groups->Feeds->ApiCalls as $name => $calls) {
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Feeds');
    }

    if ($key == 'Finances') {
        genClass('Finances', $val);
        genConstruct();
        foreach($val->Groups->Finances->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Finances');
    }

    if ($key == 'FulfillmentByAmazon') {
        //echo "\tFulfillmentInbound", EOL;
        genClass('FulfillmentInbound', $val);
        genConstruct();
        foreach($val->Groups->FulfillmentInbound->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('FulfillmentInbound');
        //codeln('class FBAInbound extends FulfillmentInbound { }');

        //echo "\tFulfillmentInventory", EOL;
        genClass('FulfillmentInventory', $val);
        genConstruct();
        foreach($val->Groups->FulfillmentInventory->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('FulfillmentInventory');
        //codeln('class FBAInventory extends FulfillmentInventory { }');

        //echo "\tFulfillmentOutbound", EOL;
        genClass('FulfillmentOutbound', $val);
        genConstruct();
        foreach($val->Groups->FulfillmentOutbound->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('FulfillmentOutbound');
        //codeln('class FBAOutbound extends FulfillmentOutbound { }');
    }

    if ($key == 'MerchantFulfillment') {
        genClass('MerchantFulfillment', $val);
        genConstruct();
        foreach($val->Groups->{'Merchant Fulfillment'}->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('MerchantFulfillment');
    }

    /*
    if ($key == 'OffAmazonPayments') {
        genClass('OffAmazonPayments', $val);
        genConstruct();
        foreach($val->Groups->OffAmazonPayments->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('OffAmazonPayments');
    }

    if ($key == 'OffAmazonPayments-Sandbox') {
        genClass('OffAmazonPaymentSandbox', $val);
        genConstruct();
        foreach($val->Groups->{'OffAmazonPayments-Sandbox'}->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('OffAmazonPaymentSandbox');
    }
    */

    if ($key == 'Orders') {
        genClass('Orders', $val);
        genConstruct();
        foreach($val->Groups->{'Order Retrieval'}->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Orders');
    }

    if ($key == 'Products') {
        genClass('Products', $val);
        genConstruct();
        foreach($val->Groups->Products->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Products');
    }

    if ($key == 'Recommendations') {
        genClass('Recommendations', $val);
        genConstruct();
        foreach($val->Groups->Recommendations->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Recommendations');
    }

    if ($key == 'Reports') {
        //echo "\tReports", EOL;
        genClass('Reports', $val);
        genConstruct();
        foreach($val->Groups->Reports->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
#       genInvoke();
#       endClass('Reports');

        //echo "\tReportSchedule", EOL;
#       genClass('ReportSchedule', $val);
#       genConstruct();
        foreach($val->Groups->ReportSchedule->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
#       endClass('ReportSchedule');
        endClass('Reports');
    }

    if ($key == 'Sellers') {
        genClass('Sellers', $val);
        genConstruct();
        foreach($val->Groups->{'Sellers Retrieval'}->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Sellers');
    }

    if ($key == 'Subscriptions') {
        //echo "\tDestinations", EOL;
        genClass('Subscriptions', $val);
        genConstruct();
#       genClass('SubscriptionDestinations', $val);
#       genConstruct();
        foreach($val->Groups->Destinations->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
#       genInvoke();
#       endClass('SubscriptionDestinations');

        //echo "\tSubscriptions", EOL;
#       genClass('Subscriptions', $val);
#       genConstruct();
        foreach($val->Groups->Subscriptions->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Subscriptions');
    }
}

function genMethod($name, $calls)
{
    codeln('public function '. lcfirst($name). '()');
    codeln('{');

    $str = '';
    foreach ($calls->Parameters as $param) {
        $str = "// \$params['". $param->Name. "'] = ";
        if (isset($param->Required) && $param->Required) {
            $str .= "(Required) ";
        }
        if (isset($param->List) && $param->List) {
            $str .= " (List) ";
        }
        if (isset($param->Type)) {
            $str .= "(Type: ". $param->Type. ")";
        }
        codeln($str);
    }

    if ($str) codeln('');

    codeln("\$this->params['Action'] = '". $name. "';"); codeln('');
    codeln('$response = $this->invoke();'); codeln('');
    codeln('return $response->'.$name.'Result;');
    codeln("}");
    codeln("");
}

function genInvoke()
{
    codeln('protected function invoke()');
    codeln('{');
    codeln(    '$path = self::PATH;'); codeln('');
    codeln(    '$this->params[\'Version\'] = self::VERSION;'); codeln('');
    codeln(    '$response = $this->client->httpGet($path, $this->params);'); codeln('');
    codeln(    '$this->params = []; // reset for next api call'); codeln('');
    codeln(    'if ($response->getName() == \'ErrorResponse\') {');
    codeln(        'throw new \Exception($response->Error->Message);');
    codeln(    '}'); codeln('');
    codeln(    '// TODO: parse response');
    codeln(    'return $response;');
    codeln('}'); codeln('');
}

function genConstruct()
{
   #codeln('public function __construct($client)';
   #codeln('{';
   #codeln('$this->params[\'Version\'] = self::VERSION;';
  ##codeln('$this->params[\'Path\'] = self::PATH;';
   #codeln('parent::__construct($client);';
   #codeln('}');
}

function genClass($className, $val)
{
    if (!DEBUG) {
        ob_start();
    }

    codeln('<?php');
    codeln('');
    codeln('namespace Amazon\\Mws;');
    codeln('');
    codeln("class $className extends MwsApi");
    codeln('{');
    codeln(    "const NAME = '". $val->Name. "';");
    codeln(    "const VERSION = '". $val->Version. "';");
    codeln(    "const PATH = '/". $val->Name. "/". $val->Version. "';"); codeln('');
/*
    codeln(    'protected $client;');
    codeln(    'protected $params = [];'); codeln('');

    codeln(    'public function __construct($client)');
    codeln(    '{');
    codeln(        '$this->client = $client;');
    codeln(    '}'); codeln('');

    codeln(    'public function set($name, $value)');
    codeln(    '{');
    codeln(        'if (is_array($value)) {');
    codeln(            '$N = 1;');
    codeln(            'foreach ($value as $val) {');
    codeln(                '$this->params["$name.$N"] = $val;');
    codeln(                '$N++;');
    codeln(            '}');
    codeln(        '}');
    codeln(        'else {');
    codeln(            '$this->params[$name] = $value;');
    codeln(        '}');
    codeln(        'return $this;');
    codeln(    '}'); codeln('');

    codeln(    'public function __set(\$name, \$value)');
    codeln(    '{');
    codeln(        'if (substr($name, 0, 3) == \'set\') {');
    codeln(            '$name = substr($name, 3);');
    codeln(            '$this->params[$name] = $value;');
    codeln(        '}');
    codeln(        'return $this;');
    codeln(    '}'); codeln('');

    codeln(    'public function reset()');
    codeln(    '{');
    codeln(        '$this->params = [];');
    codeln(    '}'); codeln('');
*/
}

function endClass($className)
{
    codeln('}');
#   codeln('');

    if (!DEBUG) {
        $code = ob_get_contents();
        ob_end_clean();

        file_put_contents("$className.php", "$code");
#       file_put_contents("$className.php", "<?php\n\nnamespace Amazon\\Mws;\n\n$code");
    }
}

function codeln($code)
{
    static $indent = 0;

    if ($code == '') {
        echo EOL;
        return;
    }

    if (substr($code, -1) == '}') {
        $indent = max($indent-1, 0);
    }

    echo str_repeat(' ', $indent*4);
    echo trim($code), EOL;

    if (substr($code, -1) == '{') {
        $indent++;
    }
}
