<?php

class CarreraModel{
    private $db;

    public function __construct(){
        $this->db = $this->connectDB();
    }

    public function __destruct(){
        $this->db = null;
    }

    public function connectDB(){
        return new PDO('mysql:host=localhost;'.'dbname=informacion_carreras;charset=utf8', 'root', '');
    }

    public function getMateria(){
        $sentencia = $db->prepare("SELECT * FROM materia");
        $sentencia->execute();
    
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCarrera(){
        $sentencia = $db->prepare("SELECT * FROM carrera");
        $sentencia->execute();
    
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }      
    //INSERTAR materia            
    //arreglar desde controller
    public function insertarMateria($nombre, $profesor, $carrera){
        $sentencia = $db->prepare( "INSERT INTO materia(nombre,profesor,id_carrera) VALUES(?,?,?)");
        $sentencia = $db->execute(array($nombre, $profesor, $carrera));
  
        header("Location: ".BASE_URL."home");     
    }
        //arreglar desde controller
    public function borrarMateria($materia_id){
        $sentencia = $db->prepare( "DELETE FROM materia WHERE id=?");
        $sentencia->execute(array($materia_id));
        header("Location: ".BASE_URL."home");
    
    }
        //arreglar desde controller
    public function modificarMateria($materia_id, $nombre, $profesor, $carrera){
        $sentencia = $db->prepare("UPDATE materia SET materia(nombre,profesor,id_carrera) VALUES(?,?,?) WHERE id = :materia_id");
        $sentencia->bindParam(':materia_id', $materia_id, PDO::PARAM_STR);
        $sentencia->execute(array($nombre, $profesor, $carrera));
        header("Location: ".BASE_URL."home");
           
    }

        //arreglar desde controller
    public function filtrarMateria($nombre){
        $sentencia = $db->prepare( "SELECT * FROM materia WHERE nombre = '?' ");
        $sentencia->execute( array($nombre));
        header("Location: ".BASE_URL."home");
           
    }

    //arreglar desde controller
    public function filtrarCarrera($id_carrera){  
        $sentencia = $db->prepare( "SELECT carrera.id_carrera, materia.nombre FROM materia LEFT JOIN materia ON carrera.id_carrera = materia.id_carrera WHERE id_carrera='?'");
        $sentencia->execute( array($id_carrera));
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

        
    }
    
}