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
        $sentencia = $this->db->prepare('SELECT nombre, id_carrera FROM carrera');
        $sentencia->execute(array());
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $carreras;
    }      


         //arreglar desde controller
    public function getMateria($id_materia){
        $sentencia =$this->db->prepare( "SELECT * FROM materia WHERE id_materia = ?");
        $sentencia->execute( array($id_materia) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    // //arreglar desde controller
    public function filtrarCarrera($id_carrera){  
        $sentencia =$this->db->prepare("SELECT materia.nombre, carrera.id_carrera, materia.id_materia FROM carrera INNER JOIN materia ON carrera.id_carrera = materia.id_carrera WHERE carrera.id_carrera = ?");
        $sentencia->execute(array($id_carrera));
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
 
    }
  //insertar carrera
    function insertarCarrera($nombre,$duracion){
        $sentencia =$this-> db->prepare("INSERT INTO carrera(nombre,duracion) VALUES(?,?)");
        $sentencia->execute(array($nombre,$duracion));
  
        header("Location: ".BASE_URL."carreras");     
    }
  
    //INSERTAR materia            

    function insertarMateria($nombre, $profesor,$id_carrera){
        $sentencia =$this-> db->prepare("INSERT INTO materia(nombre,profesor,id_carrera) VALUES(?,?,?)");
        $sentencia->execute(array($nombre,$profesor,$id_carrera));
  
        header("Location: ".BASE_URL."materias");     
    }


    //     //arreglar desde controller
    // public function borrarMateria($materia_id){
    //     $sentencia = $this->db->prepare( "DELETE FROM materia WHERE id=?");
    //     $sentencia->execute(array($materia_id));
    //     header("Location: ".BASE_URL."home");
    
    // }
    //     //arreglar desde controller
    // public function modificarMateria($materia_id, $nombre, $profesor, $carrera){
    //     $sentencia =$this->db->prepare("UPDATE materia SET materia(nombre,profesor,id_carrera) VALUES(?,?,?) WHERE id = :materia_id");
    //     $sentencia->bindParam(':materia_id', $materia_id, PDO::PARAM_STR);
    //     $sentencia->execute(array($nombre, $profesor, $carrera));
    //     header("Location: ".BASE_URL."home");
           
    // }
    
}