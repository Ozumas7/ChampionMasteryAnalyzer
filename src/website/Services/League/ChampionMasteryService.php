<?php


namespace Kolter\Website\League\Services;


use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\ChampionMastery;
use Kolter\Website\Service;

class ChampionMasteryService extends Service
{


    public static function getMasteryPointsByChampion($summonerId,$championId){
        $mastery = new ChampionMastery(self::$apikey);
        $mastery->setCacheTimeExpired(30)->setOutputMode(new ObjectOutput());
        return $mastery->champion($summonerId,$championId);
    }

    public static function getChampionMasteryById($id,$region='euw'){
        $champion = new ChampionMastery(self::$apikey);
        $champion->setCacheTimeExpired(30)->setOutputMode(new ArrayOutput())->setRegion($region);
        return $champion->champions($id);
    }


}