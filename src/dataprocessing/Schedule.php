<?php


namespace Kolter\DataProcessing;


use Kolter\Website\Util;

class Schedule
{

    protected $tasks = [];

    public function __construct($tasks=[])
    {
        $this->tasks = self::orderByPriority($tasks);
    }

    public static function createFromYaml($file='config/tasks.yaml'){
        $task = [];
        $yamlArray = Util::yamlToArray($file);
        foreach($yamlArray as $key=>$value){
            $task[$key] = new Task($key,$value['processes'],$value['priority']);
        }
        return new Schedule($task);
    }

    public function addTask(Task $task){
        array_push($this->tasks,$task);
    }

    public static function orderByPriority($tasks){
        usort($tasks,function($a,$b){

           return $a->priority<$b->priority;
        });
        return $tasks;
    }

    public function runSpecificTasks($taskstoRun=[]){
        $this->tasks = self::orderByPriority($this->tasks);
        $tasks = array_filter($this->tasks,function($v,$k) use ($taskstoRun){
            return in_array($v->name,$taskstoRun);
        },ARRAY_FILTER_USE_BOTH);
        return $this->run($tasks);

    }

    public function runAll(){
        return $this->run($this->tasks);
    }

    protected function run($tasks){
        foreach($tasks as $key=>$value){
            $value->run();
        }
        return true;
    }
}