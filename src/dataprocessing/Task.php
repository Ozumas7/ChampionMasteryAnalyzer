<?php


namespace Kolter\DataProcessing;



class Task
{
    public $name;
    public $processes=[];
    public $priorioty;

    public function __construct($name,$processes=[],$priority=0)
    {
        $this->name = $name;
        $this->processes = $processes;
        $this->priority = $priority;
    }

    public function run(){
        $result =[];
        foreach($this->processes as $key=>$value){
                $result[$key]= forward_static_call_array($value['callback'],$value['params']);
        }
        return $result;
    }

}