<?php

namespace Kolter\DataProcessing\Services\League;


use Kolter\DataProcessing\Service;
use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\Resources\League;

class LeagueService extends Service
{

    public static function getLeagueBySummonerId($summonerId){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setOutputMode(new ArrayOutput());
        $league->bysummonerentry($summonerId);
        return $league->bysummonerentry($summonerId);
    }

    public static function getChallengers($region='euw'){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setRegion($region)->setOutputMode(new ArrayOutput());
        $league->challenger('&type=RANKED_SOLO_5x5');
        return $league->challenger('&type=RANKED_SOLO_5x5');
    }
    public static function getMasters($region='euw'){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setRegion($region)->setOutputMode(new ArrayOutput());
        return $league->master('&type=RANKED_SOLO_5x5');
    }

}