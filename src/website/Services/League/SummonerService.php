<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 28/04/2016
 * Time: 19:54
 */

namespace Kolter\Website\Services\League;


use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\Summoner;
use Kolter\Website\Service;

class SummonerService extends Service
{


    public static function getSummonerByName($name,$region='euw'){
        $name = strtolower($name);
        $apikey = self::$apikey;
        $summoner = new Summoner($apikey);
        $summoner = $summoner->setOutputMode(new ArrayOutput())->setRegion($region)->setCacheTimeExpired(1000)->byname($name);
        if (isset($summoner['code'])){
            return false;
        }
        foreach($summoner as $key=>$value){
            return $value;
            break;
        }
        return false;
    }
}