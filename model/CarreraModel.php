<?php

class CarreraModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function __destruct()
    {
        $this->db = null;
    }
    // -------------------------------------MOSTRAR TABLAS----------------------------------------
    function getTablaCarreras()
    {
        $sentencia = $this->db->prepare('SELECT * FROM carrera');
        $sentencia->execute(array());
        $tablaCarreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaCarreras;
    }
    //toda la tabla materias

    // -----------------------------DEJARLA------------------------------------------------
    //PARA LA VISTA PRINCIPAL, Y PARA EL SELECT
    function getCarrera()
    {
        $sentencia = $this->db->prepare('SELECT nombre, id_carrera FROM carrera');
        $sentencia->execute(array());
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $carreras;
    }
    //OBTENER LAS MATERIAS PARA EL SELECT
    public function getMateria()
    {
        $sentencia = $this->db->prepare("SELECT nombre, id_materia FROM materia");
        $sentencia->execute(array());
        $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $materias;
    }

    //MATERIAS POR id
    // public function getMateriaPorId($id_materia)
    // {
    //     $sentencia = $this->db->prepare("SELECT * FROM materia WHERE id_materia = ?");
    //     $sentencia->execute(array($id_materia));
    //     return $sentencia->fetch(PDO::FETCH_OBJ);
    // }

    //filtro
    public function filtrarCarrera($id_carrera)
    {
        $sentencia = $this->db->prepare("SELECT materia.nombre, carrera.id_carrera, materia.id_materia FROM carrera INNER JOIN materia ON carrera.id_carrera = materia.id_carrera WHERE carrera.id_carrera = ?");
        $sentencia->execute(array($id_carrera));

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //   ------------------------------AGREGAR CARRERA Y MATERIAS----------------------------------------------
    //insertar carrera
    function insertarCarrera($nombre, $duracion)
    {
        $sentencia = $this->db->prepare("INSERT INTO carrera(nombre,duracion) VALUES(?,?)");
        $sentencia->execute(array($nombre, $duracion));
    }



        //   ------------------------------EDITAR BORRAR CARRERA----------------------------------------------       
    
    // buscarIdCarreraEnTablaMateria
    public function buscarIdCarreraEnTablaMateria($id_carrera)
    {
        $sentencia = $this->db->prepare("SELECT id_carrera FROM `materia` WHERE id_carrera=?");
        $sentencia->execute(array($id_carrera));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BORRAR CARRERA
    public function borrarCarrera($id_carrera)
    {
        $sentencia = $this->db->prepare("DELETE FROM carrera WHERE id_carrera=?");
        $sentencia->execute(array($id_carrera));
    }
    //EDITAR CARRERA
    public function editarCarrera($nombre, $duracion, $id_carrera)
    {
        $sentencia = $this->db->prepare("UPDATE `carrera` SET `nombre`=?,`duracion`=?WHERE `id_carrera`=?");
        $sentencia->execute(array($nombre, $duracion, $id_carrera));
    }

}


