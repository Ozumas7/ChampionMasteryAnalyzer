<?php

namespace Kolter\Website\League\Services;


use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\Match;
use Kolter\Website\Service;

class MatchService extends Service
{


    public static function getMatchsByMatchList($matchList){
        $result = [];
        foreach($matchList->matches as $key=>$value){
            $match = new Match(self::$apikey);
            $match = $match->setOutputMode(new ObjectOutput())->setCacheTimeExpired(100)->byid($value->matchId);
            $result[$key] = $match;
        }
        return $result;
    }

}