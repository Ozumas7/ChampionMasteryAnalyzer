<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 28/04/2016
 * Time: 20:09
 */

namespace Kolter\Website;


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