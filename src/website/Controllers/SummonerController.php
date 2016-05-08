<?php
namespace Kolter\Website\Controllers;


use Kolter\DataProcessing\Schedule;
use Kolter\DataProcessing\Task;
use Kolter\Website\Controller;
use Kolter\Website\Services\Database\AnalyzerService;
use Kolter\Website\Services\Database\IdsAnalyzer;
use Kolter\Website\Services\Database\Proxies\ChampionsServiceProxy;
use Kolter\Website\Services\League\LeagueService;
use Kolter\Website\Services\League\SummonerService;
use Kolter\Website\View;

class SummonerController extends Controller
{
    public static function show($params,$query){
        $key = urldecode($params['key']);
        $summoner = SummonerService::getSummonerByName($key,$params['region']);
        if (!$summoner){
            return self::errorResponse(View::getTemplate('summonerNotFound'),404);
        }
        $data = ChampionsServiceProxy::getChampionsBySummonerId($summoner['id']);
        $idAnalyzed = IdsAnalyzer::getId($summoner['id'],$params['region']);
        if (($data==false && $idAnalyzed==NULL) || $idAnalyzed->toArray()['Processed'] == false){
            self::processSummoner($summoner['id'],$params['region'],$idAnalyzed);
        }
        $data = ChampionsServiceProxy::getChampionsBySummonerId($summoner['id']);
        $league = LeagueService::getLeagueBySummonerId($summoner['id'],$params['region']);
        $league=['tier'=>ucfirst($league[$summoner['id']][0]['tier']),
            'entry'=>$league[$summoner['id']][0]['entries'][0]
        ];
        $intervals = self::getIntervals($query);
        $intervalsGET=array_keys($intervals);
        $intervalsGET = [$intervalsGET[0],$intervalsGET[sizeof($intervalsGET)-1],$intervalsGET[1]-$intervalsGET[0]];
        $points = AnalyzerService::getIntervals($data,$intervals);
        return self::successResponse(View::getTemplate('summoner',
            ['summoner'=>$summoner,'data'=>$data,
                'title'=>$key,'league'=>$league,
                'points'=>$points,'intervals'=>$intervalsGET],
            $summoner['id'].serialize($query)));
    }

    public static function processSummoner($id,$region,$processed){
        $task = [];
        if (is_null($processed)){
            array_push($task,['callback'=>'Kolter\DataProcessing\Processes\ProcessId::addId','params'=>[$id,$region]]);
        }
        array_push($task,['callback'=>'Kolter\DataProcessing\Processes\ProcessId::processId','params'=>[$id,$region]]);
        $task = new Task('addIds',$task);
        $schedule = new Schedule([$task]);
        $schedule->runAll();
    }

    public static function getIntervals($query){
        extract($query);
        $initial = intval($initial);
        $final = intval($final);
        $interval = intval($interval);
        if (empty($query) || !isset($initial,$final,$interval) || $initial>=$final || $interval>$final ||
            $final<=0 || $initial<0 || $interval<=0 || !is_int($initial) ||  !is_int($final) || !is_int($interval) ||
            $interval>10000000 || $interval<1000 || $initial>10000000 || $final>10000000){
            return [0=>[],10000=>[],20000=>[],30000=>[],40000=>[],50000=>[],60000=>[],70000=>[],80000=>[],90000=>[]
                ,100000=>[]];
        }
        $result = [];
        for($i=$initial;$i<=$final;$i+=$interval){
            $result[$i]=[];
        }
        return $result;
    }
}