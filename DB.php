<?php

class DB
{
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $db = "ocene";
    public $connection;


    function connect()
    {
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->db);
    }


    function __construct()
    {
        $this->connect();
    }
}
