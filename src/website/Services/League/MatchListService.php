<?php


namespace Kolter\Website\League\Services;


use Kolter\PLoL\OutputModes\ObjectOutput;
use Kolter\PLoL\Resources\Match;
use Kolter\Website\Service;

class MatchListService extends Service
{
    public static function getMatchListById($id,$beginIndex='',$endIndex=''){
        $matchList = new Match(self::$apikey);
        $matchList = $matchList->setOutputMode(new ObjectOutput())->
        setCacheTimeExpired(30)->
        bysummoner($id,"&beginIndex=$beginIndex&endIndex=$endIndex");

        return $matchList;
    }

}