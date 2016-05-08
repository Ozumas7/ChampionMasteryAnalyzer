<?php


namespace Kolter\DataProcessing\Processes;

use Kolter\DataProcessing\Services\Database\ChampionService;
use Kolter\DataProcessing\Services\Database\ChampionsService;
use Kolter\DataProcessing\Services\Database\IdsService;
use Kolter\DataProcessing\Services\League\ChampionMasteryService;
use Kolter\DataProcessing\Services\League\StatsService;

class ProcessId
{


    public static function addId($id,$region,$processed=false){
        IdsService::addId($id,$region,$processed);
    }
    public static function processId($id,$region){
        $idDB = IdsService::getId($id,$region);
        if ($idDB==NULL || $idDB['Processed']==TRUE){
            return false;
        }
        $championMastery = ChampionMasteryService::getChampionMasteryById($id,$region);
        $stats = StatsService::setIDasKeyRankedStats($id,$region);
        if (!$stats) return false;
        IdsService::setIdProcessed($id,$region);
        foreach($championMastery as $key=>$value){
            if (array_key_exists($value['championId'],$stats)) {
                $champion = [];
                $champion['Championid'] = $value['championId'];
                $champion['Summonerid'] = $value['playerId'];
                $champion['Totalsessionsplayed'] = $stats[$value['championId']]['totalSessionsPlayed'];
                $champion['Totalsessionswon'] =$stats[$value['championId']]['totalSessionsWon'];
                $champion['Totalsessionslost'] =$stats[$value['championId']]['totalSessionsLost'];
                $champion['Totalchampionkills'] = $stats[$value['championId']]['totalChampionKills'];
                $champion['Totalassists'] = $stats[$value['championId']]['totalAssists'];
                $champion['Totaldeathspersession'] =$stats[$value['championId']]['totalDeathsPerSession'];
                $champion['Totalgoldearned']= $stats[$value['championId']]['totalGoldEarned'];
                $champion['Totaldamagedealt'] = $stats[$value['championId']]['totalMagicDamageDealt'] +
                    $stats[$value['championId']]['totalPhysicalDamageDealt'];
                $champion['Totaldamagetaken'] =$stats[$value['championId']]['totalDamageTaken'];
                $champion['Id'] =$champion['Summonerid'].':'.$champion['Championid'];
                $champion['Points'] = $value['championPoints'];
                $champion['Region'] = $value['region'];
                $champion['Winratio'] = round(($stats[$value['championId']]['totalSessionsWon'] * 100) /
                    max($stats[$value['championId']]['totalSessionsPlayed'], 1), 2);
                self::updateTotalChampions($champion);
                ChampionsService::addChampion($champion);
            }
        }
        return true;
    }

    public static function updateTotalChampions($champion){
        $championbd = ChampionService::getChampionById($champion['Championid']);
        $champion['Entries']=1;
        $champion['Id']=$champion['Championid'];
        unset($champion['Championid']);
        unset($champion['Region']);
        unset($champion['Summonerid']);
        foreach($championbd as $key=>$value){
            if ($key=='Id') continue;
            $champion[$key] +=$championbd[$key];
        }
        ChampionService::updateChampion($champion);
        return true;
    }

    public static function processIds($total=10){
        $ids = IdsService::getIdsNoProcessed();
        if ($ids==NULL){
            return false;
        }
        $ids = $ids->toArray();
        foreach($ids as $key=>$value){
            self::processId($value['Id'],$value['Region']);
        }
        return true;
    }
}