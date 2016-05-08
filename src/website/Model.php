<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 01/05/2016
 * Time: 0:21
 */

namespace Kolter\Website;



class Model
{

    public static function query ($conn,$query){
        $cache = new CacheHandler($query);
        $item = $cache->getCache();
        if (!$item){
            $conn->execute();
            $result = $conn->fetchAll();
            $cache->setInCache($result,10);
            return $result;
        }
        return $item;
    }
}