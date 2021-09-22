<?php

class PuppendModel{
    private $db;

    public function __construct(){
        $this->db = $this->connectDB();
    }

    // public function __destruct(){
    //     $this->db = null;
    // }                         -> esto no se para que es

    public function connectDB(){
        return new PDO('mysql:host=localhost;'.'dbname=db_puppend;charset=utf8', 'root', '');
    }
    //mostrar animales
    public function getAnimals(){
        // Obtiene la lista de peliculas de la DB según género
      
        $sentencia = $this->db->prepare('SELECT animal FROM animal ');
        $sentencia->execute(); 
        $animales = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $animales;
}
    // public function getProductPerros($producto){
    //          // Obtiene la lista de peliculas de la DB según género
           
    //          $sentencia = $this->db->prepare('SELECT producto FROM accesorio WHERE id_animal = 1');
    //          $sentencia->execute(array($producto)); 
    //          $accesorios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //          return $accesorios;
    // }
}