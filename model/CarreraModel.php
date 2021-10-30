<?php

class CarreraModel
{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function __destruct(){
        $this->db = null;
    }

    function getTablaCarreras(){
        $sentencia = $this->db->prepare('SELECT * FROM carrera');
        $sentencia->execute(array());
        $tablaCarreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaCarreras;
    }

    //PARA LA VISTA PRINCIPAL, Y PARA EL SELECT
    function getCarreras(){
        $sentencia = $this->db->prepare('SELECT nombre, id_carrera FROM carrera');
        $sentencia->execute(array());
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $carreras;
    }

    function getCarrera($id_carrera){
        $sentencia = $this->db->prepare('SELECT * FROM carrera WHERE id_carrera = ?');
        $sentencia->execute(array($id_carrera));
        $carrera = $sentencia->fetch(PDO::FETCH_OBJ);
        return  $carrera;
    }
    
    public function filtrarCarrera($id_carrera, $nombre_carrera){  
        $sentencia =$this->db->prepare("SELECT materia.nombre, carrera.id_carrera, materia.id_materia FROM carrera INNER JOIN materia
                                        ON carrera.id_carrera = materia.id_carrera WHERE carrera.id_carrera = ? AND carrera.nombre = ?");
        $sentencia->execute(array($id_carrera, $nombre_carrera));
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function insertarCarrera($nombre, $duracion){
        $sentencia = $this->db->prepare("INSERT INTO carrera(nombre,duracion) VALUES(?,?)");
        $sentencia->execute(array($nombre, $duracion));
        return $this->db->lastInsertId();
    }      
    
    public function getColumn($id, $column){
        $sentencia = $this->db->prepare("SELECT $column FROM carrera WHERE id_carrera = ?");
        $sentencia->execute(array($id));
        $carrera = $sentencia->fetch(PDO::FETCH_OBJ);
        return  $carrera;
    }

    public function borrarCarrera($id_carrera){
        $sentencia = $this->db->prepare("DELETE FROM carrera WHERE id_carrera=?");
        $sentencia->execute(array($id_carrera));
    }

    public function editarCarrera($nombre, $duracion, $id_carrera){
        $sentencia = $this->db->prepare("UPDATE `carrera` SET `nombre`=?,`duracion`=?WHERE `id_carrera`=?");
        $sentencia->execute(array($nombre, $duracion, $id_carrera));
    }
}
