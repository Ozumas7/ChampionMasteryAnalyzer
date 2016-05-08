<?php

namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\Services\Database\Proxies\ChampionServiceProxy;
use Kolter\Website\View;

class StatisticsController extends Controller
{


    public static function show(){
        $champions=ChampionServiceProxy::getAllChampion();
        return self::successResponse(View::getTemplate('statistics',['champions'=>$champions,'title'=>'Statistics']));

    }
}