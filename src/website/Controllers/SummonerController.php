<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 05/05/2016
 * Time: 19:22
 */

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
    public static function show($params,$method){
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
        $league = LeagueService::getLeagueBySummonerId($summoner['id']);
        $league=['tier'=>ucfirst($league[$summoner['id']][0]['tier']),
            'entry'=>$league[$summoner['id']][0]['entries'][0]
           ];
        $points = AnalyzerService::getIntervals($data,$intervals =[0=>[],10000=>[],20000=>[],30000=>[],40000=>[],50000=>[],60000=>[]]);
        return self::successResponse(View::getTemplate('summoner',
            ['summoner'=>$summoner,'data'=>$data,
                'title'=>$key,'league'=>$league,
            'points'=>$points],$summoner['id']));
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
}