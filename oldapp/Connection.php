<?php

class Connection
{

    protected $db;
    protected $production;

    function __construct()
    {
        $production = false;// true in production
		$icsbinco = false;//icsbinco_puzzlem
        $username = "";
        $pass = "";
		if ($icsbinco) {
            $username = "icsbinco_puzzlem";
            $password = "Dh23HRENtf5N";
            $dbname = "icsbinco_puzzlemaster";
        } 
        else if ($production) {
            $username = "metroics_webuser";
            $password = "Dh23HRENtf5N";
            $dbname = "metroics_puzzle_master";
        } else {
            $username = "root";
            $password = "";
            $dbname = "puzzles_db";
        }
        $conn = NULL;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=" . $dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
    }

    public function getConnection()
    {
        return $this->db;
    }
}