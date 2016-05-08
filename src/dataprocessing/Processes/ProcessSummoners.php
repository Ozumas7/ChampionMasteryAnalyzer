<?php


namespace Kolter\DataProcessing\Processes;


use Kolter\DataProcessing\Services\Database\IdsService;
use Kolter\DataProcessing\Services\League\LeagueService;

class ProcessSummoners
{


    public static function getChallengersAndMastersIds($region){
        $masters = LeagueService::getChallengers($region);
        $challengers = LeagueService::getMasters($region);
        $data = array_merge($masters['entries'],$challengers['entries']);
        foreach($data as $key=>$value){
            $id = $value['playerOrTeamId'];
            if (IdsService::existsId($id,$region)!=NULL){
            ProcessId::addId($id,$region);
            }
        }
    }
}