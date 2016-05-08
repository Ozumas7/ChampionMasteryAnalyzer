<?php

namespace Kolter\Website\Services\Database;


use Kolter\DataBase\Models\ChampionsQuery;

class ChampionsService
{

    public static function getAllChampions(){
        $champions = new ChampionsQuery();
        return $champions->find()->toArray();
    }

    public static function getChampionsBySummonerId($id){
        $champions = new ChampionsQuery();
        if ($champions->findOneBySummonerid($id)==NULL){
            return false;
        }
        return $champions->findBySummonerid($id)->toArray();
    }

    public static function getAllChampionsById($id){
        $champions = new ChampionsQuery();
        return $champions->findByChampionid($id)->toArray();
    }

}