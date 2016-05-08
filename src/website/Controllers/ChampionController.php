<?php


namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\Services\Database\ChampionService;
use Kolter\Website\Services\Database\AnalyzerService;
use Kolter\Website\Services\Database\ChampionsService;
use Kolter\Website\Services\Database\Proxies\ChampionServiceProxy;
use Kolter\Website\Services\League\StaticDataService;
use Kolter\Website\View;

class ChampionController extends Controller
{


    public static function show($params){
        $key = urldecode($params['key']);
        $championByKey = StaticDataService::getChampionByKey($key);
        $championByName = StaticDataService::getChampionByName($key);
        if ($championByKey==false && $championByName==false){
            return self::errorResponse(View::getTemplate('championNotFound'),404);
        }
        $champion = ($championByKey==true) ? $championByKey : $championByName;
        $data = ChampionsService::getAllChampionsById($champion['id']);
        $total = sizeof($data);
        $statChampion = ChampionServiceProxy::getChampionById($champion['id']);
        $points = AnalyzerService::getIntervals($data);
        $total_entries = ChampionService::getTotalEntries();
        return self::successResponse(View::getTemplate('champion',
            ['points'=>$points,'total'=>$total,'champion'=>$champion,
            'stats'=>$statChampion,'total_entries'=>$total_entries,'title'=>ucwords($key)],$champion['id']));
    }

}