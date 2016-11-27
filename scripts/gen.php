<?php

const EOL = "\n";

$json = json_decode(file_get_contents('mws-api.json'));

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
//*
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

        //echo "\tFulfillmentInventory", EOL;
        genClass('FulfillmentInventory', $val);
        genConstruct();
        foreach($val->Groups->FulfillmentInventory->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('FulfillmentInventory');

        //echo "\tFulfillmentOutbound", EOL;
        genClass('FulfillmentOutbound', $val);
        genConstruct();
        foreach($val->Groups->FulfillmentOutbound->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('FulfillmentOutbound');
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
        genClass('OffAmazonPayments', $val);
        genConstruct();
        foreach($val->Groups->{'OffAmazonPayments-Sandbox'}->ApiCalls as $name => $calls) {
            //echo "\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('OffAmazonPayments');
    }

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
        genInvoke();
        endClass('Reports');

        //echo "\tReportSchedule", EOL;
        genClass('ReportSchedule', $val);
        genConstruct();
        foreach($val->Groups->ReportSchedule->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('ReportSchedule');
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
        genClass('Destinations', $val);
        genConstruct();
        foreach($val->Groups->Destinations->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Destinations');

        //echo "\tSubscriptions", EOL;
        genClass('Subscriptions', $val);
        genConstruct();
        foreach($val->Groups->Subscriptions->ApiCalls as $name => $calls) {
            //echo "\t\t", $name, EOL;
            genMethod($name, $calls);
        }
        genInvoke();
        endClass('Subscriptions');
    }
//*/
    //echo EOL;
}

function genMethod($name, $calls)
{
    echo "\tpublic function ", lcfirst($name), "()\n";
    echo "\t{\n";
    foreach ($calls->Parameters as $param) {
        echo "\t\t// \$params['", $param->Name, "'] = ";
        if (isset($param->Required) && $param->Required) {
            echo "(Required) ";
        }
        if (isset($param->List) && $param->List) {
            echo " (List) ";
        }
        if (isset($param->Type)) {
            echo "(Type: ", $param->Type, ")";
        }
        echo "\n";
    }
    echo "\n";
    echo "\t\t", "\$this->params['Action'] = '", $name, "';\n\n";
    echo "\t\t", "return \$this->invoke();\n";
    echo "\t}\n\n"; 
}

function genInvoke()
{
    echo "\tprotected function invoke()\n";
    echo "\t{\n";
    echo "\t\t", "\$path = self::PATH;\n";
    echo "\n";

    echo "\t\t", "\$this->params['Version'] = self::VERSION;\n";
    echo "\n";

    echo "\t\t", "\$response = \$this->client->httpGet(\$path, \$this->params);\n";
    echo "\n";
    echo "\t\t", "// TODO: parse response\n";
    echo "\t\t", "return \$response;\n";
    echo "\t}\n";
    echo "\n";
}

function genConstruct()
{
   #echo "\tpublic function __construct(\$client)\n";
   #echo "\t{\n";
   #echo "\t\t", "\$this->params['Version'] = ", "self::VERSION;\n";
  ##echo "\t\t", "\$this->params['Path'] = ", "self::PATH;\n\n";
   #echo "\t\t", "parent::__construct(\$client);\n";
   #echo "\t}\n\n";
}

function genClass($className, $val)
{
#   ob_start();
    echo "<?php\n";
    echo "\n";
    echo "namespace Amazon\\Mws;\n";
    echo "\n";
    echo "class $className extends MwsApi\n{\n";
    echo "\tconst NAME = '", $val->Name, "';\n";
    echo "\tconst VERSION = '", $val->Version, "';\n";
    echo "\tconst PATH = '/", $val->Name, "/", $val->Version, "';\n";
    echo "\n";
}

function endClass($className)
{
    echo "}\n\n";
#   $code = ob_get_contents();
#   ob_end_clean();

#   file_put_contents("$className.php", "$code");
#   file_put_contents("$className.php", "<?php\n\nnamespace Amazon\\Mws;\n\n$code");
}
