<?php
namespace App\Misc\Payment\Mpesa\Mpesa;

use ErrorException;

class Validator
{
   protected $default_endpoints=[];
   protected $endpoint=null;
    public function validatesEndpoints(string $env)
    {
        if(!$this->endpoint){
if(!in_array($env,$this->default_endpoints))
{
    throw new \ErrorException("Endpoint Missing");
}
$this->endpoint= $this->default_endpoints($env);
        }
    }
}
