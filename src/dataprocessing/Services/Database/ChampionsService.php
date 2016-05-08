<?php


namespace Kolter\DataProcessing\Services\Database;


use Kolter\DataBase\Models\Champions;
use Kolter\DataBase\Models\ChampionsQuery;

class ChampionsService
{

    public static function existsSummonerId($id,$region,$limit=0){
        $champions = new ChampionsQuery();
        return ($champions->filterBySummonerid($id)->filterByRegion($region)->findOne()==NULL) ? false : true;
    }

    public static function addChampion($data){
        $champion = new Champions();
        foreach($data as $key=>$value){
            $champion->{'set'.$key}($value);
        }
        $champion->setUpdateAt((new \DateTime())->getTimestamp());
        return $champion->save();
    }

}