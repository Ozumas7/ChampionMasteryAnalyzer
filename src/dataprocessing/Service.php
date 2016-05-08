<?php


namespace Kolter\DataProcessing;


use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\Staticdata;

class Service
{
    public static $apikey;

    public static function getVersion(){
            $version = new Staticdata(self::$apikey);
            $version->cache->setTimeExpire(60*24);
            return $version->setOutputMode(new ObjectOutput())->versions()[0];
    }
}