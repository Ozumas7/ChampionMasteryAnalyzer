<?php


namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\Services\Database\ChampionService;
use Kolter\Website\Services\Database\Proxies\ChampionServiceProxy;
use Kolter\Website\Services\League\StaticDataService;
use Kolter\Website\View;

class Home extends Controller
{

    public static function home(){
        $allChampions = StaticDataService::getChampions();
        ksort($allChampions);
         $champs = ['most'=>ChampionServiceProxy::getMostMasteryPointsChampions(),
        'average'=> ChampionServiceProxy::getMostAverageMasteryPointsChampions(),
        'all'=>$allChampions];
        return self::successResponse(View::getTemplate('home',['champs'=>$champs]));
    }


}