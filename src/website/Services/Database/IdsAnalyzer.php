<?php


namespace Kolter\Website\Services\Database;


use Kolter\DataBase\Models\IdsQuery;

class IdsAnalyzer
{


    public static function getId($id,$region){
        $ids = new IdsQuery();
        return $ids->filterByRegion($region)->findOneById($id);
    }

}