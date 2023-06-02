<?php
session_start();
date_default_timezone_set("Asia/Manila");

class DatabaseHelper
{
    private $dbHost, $dbUser, $dbPassword, $dbName;
    public function dbConnect(){
        $this->dbHost = 'localhost';
        $this->dbUser = 'root';
        $this->dbPassword = '';
        $this->dbName = 'dental_db';

        $dbConString = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $dbConString;
    }

}