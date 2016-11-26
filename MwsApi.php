<?php

class MwsApi
{
    protected $client;
    protected $params = [];

    public function __construct($client)
    {
        $this->client = $client;

       #$config = $client->getConfig();

       #$this->params['AWSAccessKeyId'] = $config['AWSAccessKeyId'];
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
        if (substr($name, 0, 3) == 'set') {
            $name = substr($name, 3);
            $this->params[$name] = $value;
        }
        return $this;
    }
}
