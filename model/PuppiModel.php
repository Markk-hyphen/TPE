<?php

class PuppiModel{
    private $db;

    public function __construct(){
        $this->db = $this->connectDB();
    }

    public function __destruct(){
        $this->db = null;
    }

    public function connectDB(){
        return new PDO('mysql:host=localhost;'.'dbname=db_puppend;charset=utf8', 'root', '');
    }

    public function pruebaPupiModel(){
        echo "Aca, habla el model vieja";
    }
}