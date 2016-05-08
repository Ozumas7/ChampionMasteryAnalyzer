<?php

namespace Kolter\DataProcessing\Services\League;


use Kolter\DataProcessing\Service;
use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\Resources\Stats;

class StatsService extends Service
{


    public static function getRankedStats($summonerId,$region='euw'){
        $stats = new Stats(self::$apikey);
        return $stats->setOutputMode(new ArrayOutput())->setRegion($region)->setCacheTimeExpired(30)->ranked($summonerId);
    }

    public static function setIDasKeyRankedStats($summonerId,$region='euw'){
        $stats = self::getRankedStats($summonerId,$region);
        $result = [];
        if(is_null($stats['champions'])) return false;
        foreach($stats['champions'] as $key=>$value){
            $result[$value['id']]= $value['stats'];
        }
        return $result;
    }
}