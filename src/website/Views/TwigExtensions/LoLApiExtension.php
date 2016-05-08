<?php


namespace Kolter\Website\Views\TwigExtensions;


use Kolter\Website\Config;
use Kolter\Website\Services\League\StaticDataService;
use Kolter\Website\Views\LoLStaticData;

class LoLApiExtension extends \Twig_Extension
{
    public function getName(){
        return 'LoL Api Extension';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('round', [$this,'round']),
            new \Twig_SimpleFunction('size', [$this,'size']),
            new \Twig_SimpleFunction('champName', [$this,'champName']),
            new \Twig_SimpleFunction('championLink', [$this,'getChampionLink']),
            new \Twig_SimpleFunction('iconLink', [$this,'getIconLink']),
            new \Twig_SimpleFunction('getChampImage', [$this,'getChampImage'],['is_safe' => ['html']]),
            new \Twig_SimpleFunction('randomSkin', [$this,'randomSkin']),
            new \Twig_SimpleFunction('min', [$this,'min']),
            new \Twig_SimpleFunction('percent', [$this,'percent']),
            new \Twig_SimpleFunction('tierLink', [$this,'tierLink']),
        );
    }

    public function round($valor,$decimals=2){
        return round($valor,$decimals);
    }

    public function size($array){
        return sizeof($array);
    }


    public function randomSkin($champion,$skins){
        $skin = $skins[array_rand($skins)]['num'];
        return LoLStaticData::getUrlSplashArt($champion,$skin);
    }


    public function getChampImage($champion,$size=80){
        if ($champion!=0){
            $championName = StaticDataService::getChampionById($champion)->key;
        }else{
            return '';
        }
        return '<img src="'.LoLStaticData::getUrlChampion($championName).'" width="'.$size.'px"/>';
    }

    public function tierLink($tier){
        return Config::getUrl().'/public/img/base_icons/'.strtolower($tier).'.png';
    }

    public function getChampionLink($champion){
        if ($champion!=0){
            $championName = StaticDataService::getChampionById($champion)->name;
        }else{
            return '';
        }
        $url = Config::getUrl();
        return "$url/champion/$championName";
    }

    public function getIconLink($icon){
        return LoLStaticData::getUrlIcon($icon);
    }
    public function champName($id){

        if ($id!=0){
            return StaticDataService::getChampionById($id)->name;
        }else{
            return '';
        }
    }

    public function percent($total,$val){
        return round(($val*100)/$total,2);
    }
    public function min($val1,$val2){
    return max($val1,$val2);
    }



}