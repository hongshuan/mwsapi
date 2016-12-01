<?php

namespace Amazon\Mws;

class MwsApi
{
    protected $client;
    protected $params = [];
    protected $results = []; // for NextToken ??

    public function __construct($client)
    {
        $this->client = $client;

       #$config = $client->getConfig();

       #$this->params['AWSAccessKeyId'] = $config['AccessKeyId'];
       #$this->params['SellerId']       = $config['SellerId'];
       #$this->params['MarketplaceId']  = $config['MarketplaceId'];
    }

    public function set($name, $value)
    {
        if (is_array($value)) {
            foreach ($value as $val) {
                $this->params["$name.$N"] = $val;
            }
        } else {
            $this->params[$name] = $value;
        }
        return $this;
    }

    public function __set($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function __call($name, $value)
    {
        if (substr($name, 0, 3) == 'set') {
            $name = substr($name, 3);
            $this->params[$name] = current($value);
        }
        return $this;
    }

    protected function reset()
    {
        $this->params = [];
        $this->results = [];
    }

    protected function isNumericArray($var)
    {
        return count(array_filter(array_keys($var), 'is_string')) == 0;
    }

    protected function xml2array($xml)
    {
        $arr = array();

        foreach ($xml->children() as $r) {
            if(count($r->children()) == 0) {
                $arr[$r->getName()] = strval($r);
            }
            else {
                $arr[$r->getName()][] = xml2array($r);
            }
        }

        return $arr;
    }
}
