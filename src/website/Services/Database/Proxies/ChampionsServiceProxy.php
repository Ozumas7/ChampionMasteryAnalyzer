<?php


namespace Kolter\Website\Services\Database\Proxies;


use Kolter\Website\CacheHandler;

use Kolter\Website\Services\Database\ChampionsService;

class ChampionsServiceProxy extends ChampionsService
{
    public static $prefix = 'champions_';
    public static function getChampionsBySummonerId($id){
        $cache = new CacheHandler(self::$prefix.__FUNCTION__.'bysummoner-'.$id);
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }
        $result = parent::getChampionsBySummonerId($id);
        $cache->setInCache($result,60);
        return $result;
    }
}