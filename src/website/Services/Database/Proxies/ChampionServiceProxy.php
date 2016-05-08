<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 05/05/2016
 * Time: 18:46
 */

namespace Kolter\Website\Services\Database\Proxies;


use Kolter\Website\CacheHandler;
use Kolter\Website\Services\Database\ChampionService;

class ChampionServiceProxy extends ChampionService
{

    public static $prefix = 'champion_';
    public static function getChampionById($id)
    {
        $cache = new CacheHandler(self::$prefix.__FUNCTION__.$id);
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }
        $result = parent::getChampionById($id);
        $cache->setInCache($result,60);
        return $result;
    }

    public static function getAllChampion(){
        $cache = new CacheHandler(self::$prefix.__FUNCTION__.'all');
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }
        $result = parent::getAllChampion();
        $cache->setInCache($result,60);
        return $result;
    }

    public static function getMostAverageMasteryPointsChampions()
    {
        $cache = new CacheHandler(self::$prefix.__FUNCTION__.'mostaverage');
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }
        $result = parent::getMostAverageMasteryPointsChampions();
        $cache->setInCache($result,60);
        return $result;
    }

    public static function getMostMasteryPointsChampions(){
        $cache = new CacheHandler(self::$prefix.__FUNCTION__.'mostmastery');
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }
        $result = parent::getMostMasteryPointsChampions();
        $cache->setInCache($result,60);
        return $result;
    }
}