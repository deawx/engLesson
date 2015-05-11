<?php 
    class DBConnect
    {
        public $connect;
        public function __construct($host,$user,$password,$database)
        {
            $dsn = "mysql:dbname={$database};host={$host}";
            $this->connect = new PDO($dsn, $user, $password);
        }
    }