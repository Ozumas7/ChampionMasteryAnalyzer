<?php


namespace Kolter\Website\Views;


use Kolter\Website\Service;

class LoLStaticData
{
    public static $items = "http://ddragon.leagueoflegends.com/cdn/%s/img/item/%s.png ";
    public static $champions = "http://ddragon.leagueoflegends.com/cdn/%s/img/champion/%s.png";
    public static $splash ='http://ddragon.leagueoflegends.com/cdn/img/champion/splash/%s_%s.jpg';
    public static $icons = 'http://ddragon.leagueoflegends.com/cdn/%s/img/profileicon/%s.png';

    public static function getUrlImage($item){
    return sprintf(self::$items,Service::getVersion(),$item);
    }

    public static function getUrlIcon($icon){
        return sprintf(self::$icons,Service::getVersion(),$icon);
    }

    public static function getUrlChampion($champion){
        return sprintf(self::$champions,Service::getVersion(),$champion);
    }

    public static function getUrlSplashArt($champion,$skin){
        return sprintf(self::$splash,$champion,$skin);
    }
}