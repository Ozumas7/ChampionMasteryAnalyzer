<?php

namespace Kolter\DataProcessing\Services\Database;


use Kolter\DataBase\Models\Ids;
use Kolter\DataBase\Models\IdsQuery;

class IdsService
{


    public static function getId($id,$region){
        $ids = new IdsQuery();
        return $ids->filterById($id)->filterByRegion($region)->findOne()->toArray();
    }

    public static function getIdsNoProcessed(){
        $ids = new IdsQuery();
        return $ids->filterByProcessed(false)->orderByUpdatedAt()->find();
    }

    public static function setIdProcessed($id,$region){
        $ids = new IdsQuery();
        $ids = $ids->filterById($id)->filterByRegion($region)->findOneById($id)->setProcessed(true);
        $ids->save();
    }

    public static function addId($id,$region,$processed=false)
    {
        if (!is_null(self::existsId($id,$region))) return false;
        $ids = new Ids();
        $ids->setId($id)->setRegion($region)->setProcessed($processed);
        return $ids->save();
    }

    public static function existsId($id,$region){
        $ids = new IdsQuery();
        return $ids->filterById($id)->filterByRegion($region)->findOne();
    }
}