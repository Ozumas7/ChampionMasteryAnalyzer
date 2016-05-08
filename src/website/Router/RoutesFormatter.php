<?php

namespace Kolter\Website\Router;



class RoutesFormatter
{

    protected static $expressions = ['.','/','-','*','(',')','_'];

    public static function formatRegex($expression){
        foreach(self::$expressions as $value){
            $expression = str_replace($value,"\\".$value,$expression);
        }
        return '/^'.$expression.'$/i';
    }

    public static function formatParams($expression,$params){
        $result = ['params'=>[]];
        $expression = self::formatRegex($expression);
        if (preg_match_all('/\{([a-zA-Z]{1,10})\}/',$expression,$array)){
            foreach ($array[1] as $key=>$value){
                if (array_key_exists($value,$params)){
                    $expression = str_replace ($array[0][$key],$params[$value],$expression);
                    array_push($result['params'],$value);
                }
            }
        }
        $result['route'] = $expression;
        return $result;
    }
}