<?php

namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\Services\League\StaticDataService;
use Kolter\Website\Util;

class SearchController extends Controller
{

    public static function summonerOrChampion($params,$params2){
        var_dump($params);
        $key = urldecode($params2['search']);
        $championByKey = StaticDataService::getChampionByKey($key);
        $championByName = StaticDataService::getChampionByName($key);
        if ($championByKey==false && $championByName==false){
            return Util::redirect('/summoner/'.$params2['search'].'/'.$params2['region']);
        }
        return Util::redirect('/champion/'.$params2['search']);
    }
}