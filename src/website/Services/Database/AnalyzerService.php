<?php

namespace Kolter\Website\Services\Database;


use Kolter\Website\Service;

class AnalyzerService extends Service
{

    public static function getIntervals($champions,$intervals =[0=>[],25000=>[],50000=>[],75000=>[],100000=>[]]){
        $result =[];
        foreach($champions as $key=>$value){
            $intervalsIndividual = self::getIntervalByChampion($value,$intervals);
            array_push($intervals[$intervalsIndividual['interval']],$intervalsIndividual);
        }
        foreach($intervals as $key=>$value) {
            $size = sizeof($value);
            $point = [];
            if ($size == 0) continue;
            foreach ($value as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {
                    $point[$key3] += $value3;
                }
            }
            foreach($point as $key4=>$value4){
                $point[$key4]=round($point[$key4] / $size);
            }
            $point['interval']=$key;
            array_push($result,$point);
        }
        return $result;
    }

    public static function getIntervalByChampion($champion,$intervals){
        $intervalsNumber = array_keys($intervals);
        $points = $champion['Points'];
        $intervalResult=0;
        foreach($intervalsNumber as $key=>$value){
            if ($points>=$value){
                $intervalResult = $value;
                continue;
            }
            break;
        }
        $champion['interval'] = $intervalResult;
        return $champion;
    }

}