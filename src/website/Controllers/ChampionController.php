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


    public static function show($params,$query){
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
        $intervals = self::getIntervals($query);
        $points = AnalyzerService::getIntervals($data,$intervals);
        $intervalsGET=array_keys($intervals);
        $intervalsGET = [$intervalsGET[0],$intervalsGET[sizeof($intervalsGET)-1],$intervalsGET[1]-$intervalsGET[0]];
        $total_entries = ChampionService::getTotalEntries();
        return self::successResponse(View::getTemplate('champion',
            ['points'=>$points,'total'=>$total,'champion'=>$champion,
                'stats'=>$statChampion,'total_entries'=>$total_entries,'title'=>ucwords($key),
                'intervals'=>$intervalsGET],
            $champion['id'].serialize($query)));
    }

    public static function getIntervals($query){
        extract($query);
        $initial = intval($initial);
        $final = intval($final);
        $interval = intval($interval);
        if (empty($query) || !isset($initial,$final,$interval) || $initial>=$final || $interval>$final ||
            $final<=0 || $initial<0 || $interval<=0 || !is_int($initial) ||  !is_int($final) || !is_int($interval) ||
            $interval>10000000 || $interval<1000 || $initial>10000000 || $final>10000000){
            return [0=>[],25000=>[],50000=>[],75000=>[],100000=>[]];
        }
        $result = [];
        for($i=$initial;$i<=$final;$i+=$interval){
            $result[$i]=[];
        }
        return $result;
    }

}