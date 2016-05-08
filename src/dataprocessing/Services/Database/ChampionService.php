<?php


namespace Kolter\DataProcessing\Services\Database;


use Kolter\DataBase\Models\ChampionQuery;

class ChampionService
{

    public static function getChampionById($id){
        $champion = new ChampionQuery();
        return $champion->findOneByid($id)->toArray();
    }

    public static function updateChampion($data){
        $champion = ChampionQuery::create();
        $champion = $champion->findOneById($data['Id']);
        foreach($data as $key=>$value){
            $champion->{'set'.$key}($value);
        }
        $champion->setUpdateAt((new \DateTime())->getTimestamp());
        return $champion->save();
    }
}