<?php


namespace Kolter\Website\Services\League;


use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\Staticdata;
use Kolter\Website\Service;

class StaticDataService extends Service
{


    public static function getChampions(){
        $champion = new Staticdata(self::$apikey);
        $champion->cache->setTimeExpire(10000);
        return $champion->setOutputMode(new ArrayOutput())->champion('','&champData=skins')['data'];
    }
    public static function getChampionById($id=0){
        $champion = new Staticdata(self::$apikey);
        $champion->cache->setTimeExpire(1000);
        return $champion->setOutputMode(new ObjectOutput())->champion($id);
    }

    public static function getChampionByKey($keyChampion){
        $champions = self::getChampions();
        foreach($champions as $key=>$value){
            if (stristr($value['key'],$keyChampion)) return $value;
        }
        return false;
    }

    public static function getChampionByName($name){
        $champions = self::getChampions();
        $name = ucwords(strtolower($name));
        foreach($champions as $key=>$value){
            if ($value['name'] == $name){
                return $value;
            }
        }
        return false;
    }
}