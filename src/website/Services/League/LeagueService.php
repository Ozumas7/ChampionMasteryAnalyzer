<?php

namespace Kolter\Website\Services\League;


use Kolter\PLoL\OutputModes\ArrayOutput;
use Kolter\PLoL\Resources\League;
use Kolter\Website\Service;

class LeagueService extends Service
{

    public static function getLeagueBySummonerId($summonerId,$region){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setRegion($region)->setOutputMode(new ArrayOutput());
        $league->bysummonerentry($summonerId);
        return $league->bysummonerentry($summonerId);
    }

    public static function getChallengers($region='euw'){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setRegion($region)->setOutputMode(new ArrayOutput());
        $league->challenger('&type=RANKED_SOLO_5x5');
        var_dump($league->getUriResource());
        return $league->challenger('&type=RANKED_SOLO_5x5');
    }
    public static function getMasters($region='euw'){
        $league = new League(self::$apikey);
        $league->setCacheTimeExpired(30)->setRegion($region)->setOutputMode(new ArrayOutput());
        return $league->master('&type=RANKED_SOLO_5x5');
    }

}