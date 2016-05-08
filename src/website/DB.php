<?php


namespace Kolter\Website;



class DB
{
    private $dsl = '%s:host=%s;dbname=%s';

    public function __construct()
    {
        $configDatabase = Config::getDatabase();
        $dsn = sprintf($this->dsl,$configDatabase['schema'],$configDatabase['host'],$configDatabase['db']);
        $this->conn = new \PDO($dsn,$configDatabase['user'],$configDatabase['pass']);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConn(){
        return $this->conn;
    }
}