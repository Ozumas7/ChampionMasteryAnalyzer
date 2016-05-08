<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 06/05/2016
 * Time: 23:06
 */

namespace Kolter\Website\Services\Database;


use Kolter\DataBase\Models\IdsQuery;

class IdsAnalyzer
{


    public static function getId($id,$region){
        $ids = new IdsQuery();
        return $ids->filterByRegion($region)->findOneById($id);
    }

}