<?php

class CarreraModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function __destruct(){
        $this->db = null;
    }

    function getCarrera(){
        $sentencia = $this->db->prepare('SELECT nombre FROM carrera');
        $sentencia->execute(array());
    
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }      

     function getMateria($materia){
        $sentencia = $this->db->prepare('SELECT * FROM materia');
        $sentencia->execute(array($materia));
    
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
  
    //INSERTAR materia            
    //arreglar desde controller
    function insertarMateria($nombre, $profesor, $carrera){
        $sentencia =$this-> db->prepare( "INSERT INTO materia(nombre,profesor,id_carrera) VALUES(?,?,?)");
        $sentencia ->execute(array($nombre, $profesor, $carrera));
  
        header("Location: ".BASE_URL."home");     
    }
        //arreglar desde controller
    public function borrarMateria($materia_id){
        $sentencia = $this->db->prepare( "DELETE FROM materia WHERE id=?");
        $sentencia->execute(array($materia_id));
        header("Location: ".BASE_URL."home");
    
    }
        //arreglar desde controller
    public function modificarMateria($materia_id, $nombre, $profesor, $carrera){
        $sentencia =$this->db->prepare("UPDATE materia SET materia(nombre,profesor,id_carrera) VALUES(?,?,?) WHERE id = :materia_id");
        $sentencia->bindParam(':materia_id', $materia_id, PDO::PARAM_STR);
        $sentencia->execute(array($nombre, $profesor, $carrera));
        header("Location: ".BASE_URL."home");
           
    }

        //arreglar desde controller
    public function filtrarMateria($nombre){
        $sentencia =$this->db->prepare( "SELECT * FROM materia WHERE nombre = '?' ");
        $sentencia->execute( array($nombre));
        header("Location: ".BASE_URL."home");
           
    }

    //arreglar desde controller
    public function filtrarCarrera($id_carrera){  
        $sentencia =$this->db->prepare( "SELECT a.nombre, b.nombre FROM materia a LEFT JOIN carrera b ON a.id_carrera = b.id WHERE id_carrera='?'");
        $sentencia->execute( array($id_carrera));
        header("Location: ".BASE_URL."home");
        
    }
    
}