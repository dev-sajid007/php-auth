<?php

class Database{

    private $host   = "localhost";
    private $dbname = "db_auth";
    private $user   = "admin";
    private $pass   = "password";
    public $pdo;

    public function __construct()
    {
        if (!isset($pdo)) {
            try {
                $link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->pass);
                $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo = $link;
            } catch (PDOException $e) {
                die("Failed to connect with Database".$e->getMessage());
                echo "OK";
            }
        }
    }


}