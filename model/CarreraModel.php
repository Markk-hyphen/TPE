<?php

class CarreraModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function __destruct(){
        $this->db = null;
    }
    function getTablaMaterias(){
        $sentencia = $this->db->prepare('SELECT * FROM materia');
        $sentencia->execute(array());
        $tablaMaterias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaMaterias;
    }      
   //PARA LA VISTA PRINCIPAL, Y PARA EL SELECT
    function getCarrera(){
        $sentencia = $this->db->prepare('SELECT nombre, id_carrera FROM carrera');
        $sentencia->execute(array());
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $carreras;
    }      
         //OBTENER LAS MATERIAS PARA EL SELECT
         public function getMateria(){
            $sentencia =$this->db->prepare( "SELECT nombre, id_materia FROM materia");
            $sentencia->execute( array() );
           $materias =$sentencia->fetchAll(PDO::FETCH_OBJ);
           return $materias;
        }

         //MATERIAS POR id
    public function getMateriaPorId($id_materia){
        $sentencia =$this->db->prepare( "SELECT * FROM materia WHERE id_materia = ?");
        $sentencia->execute( array($id_materia) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    // //arreglar desde controller
    // public function filtrarCarrera($id_carrera){  
    //     $sentencia =$this->db->prepare("SELECT materia.nombre, carrera.id_carrera, materia.id_materia FROM carrera INNER JOIN materia ON carrera.id_carrera = materia.id_carrera WHERE carrera.id_carrera = ?");
    //     $sentencia->execute(array($id_carrera));
        
    //     return $sentencia->fetchAll(PDO::FETCH_OBJ);
 
    // }
  //insertar carrera
    function insertarCarrera($nombre,$duracion){
        $sentencia =$this-> db->prepare("INSERT INTO carrera(nombre,duracion) VALUES(?,?)");
        $sentencia->execute(array($nombre,$duracion));
  
        header("Location: ".BASE_URL."administrador/agregarcarrera");     
    }
  
    //INSERTAR materia            

    function insertarMateria($nombre, $profesor,$id_carrera){
        $sentencia =$this-> db->prepare("INSERT INTO materia(nombre,profesor,id_carrera) VALUES(?,?,?)");
        $sentencia->execute(array($nombre,$profesor,$id_carrera));
  
        header("Location: ".BASE_URL."administrador/agregamateria");     
    }
        //BORRAR MATERIA
        public function borrarMateria($id_materia){
            $sentencia = $this->db->prepare( "DELETE FROM materia WHERE id_materia=?");
            $sentencia->execute(array($id_materia));
            // header("Location: ".BASE_URL."administrador/tabla"); 
            
        }

        //BORRAR CARRERA
    // public function borrarCarrera($id_carrera){
    //     $sentencia = $this->db->prepare( "DELETE FROM carrera WHERE id_carrera=?");
    //     $sentencia->execute(array($id_carrera));
    
    //     header("Location: ".BASE_URL."borrarcarrera");   
    // }


        //arreglar desde controller
    // public function editarMateria($id_materia, $nombre, $profesor, $id_carrera){
    //     $sentencia =$this->db->prepare("UPDATE materia SET materia(nombre,profesor,id_carrera) VALUES(?,?,?) WHERE id = :materia_id");
    //     // $sentencia->bindParam(':materia_id', $materia_id, PDO::PARAM_STR);
    //     $sentencia->execute(array($id_materia,$nombre, $profesor, $id_carrera));
    //     header("Location: ".BASE_URL."editarmateria");
           
    // }
    
}