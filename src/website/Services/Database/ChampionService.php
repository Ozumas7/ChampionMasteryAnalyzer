<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 04/05/2016
 * Time: 19:59
 */

namespace Kolter\Website\Services\Database;


use Kolter\DataBase\Models\ChampionQuery;
use Kolter\Website\Services\Database\Proxies\ChampionServiceProxy;


class ChampionService
{
    public static function getChampionById($id){
        $champion = new ChampionQuery();
        return $champion->findById($id)->toArray()[0];
    }
    public static function getAllChampion(){
        $champion = new ChampionQuery();
        return $champion->find()->toArray();
    }


    public static function getTotalEntries(){
        $entries = 0;
        foreach(self::getAllChampion() as $key=>$value){
            $entries+=$value['Entries'];
        }
        return $entries;
    }

    public static function getMostAverageMasteryPointsChampions()
    {
        $champions = ChampionServiceProxy::getAllChampion();
        usort($champions, function ($a, $b) {
            return ($a['Points'] / $a['Entries']) < ($b['Points'] / $b['Entries']);
        });
        $champions = array_slice($champions,0,5);
        return $champions;
    }

    public static function getMostMasteryPointsChampions(){
        $champions = ChampionServiceProxy::getAllChampion();
        usort($champions,function($a,$b){
            return $a['Points']<$b['Points'];
        });
        $champions = array_slice($champions,0,5);
        return $champions;
    }

}