<?php

class MateriaModel
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

        //----------MATERIAS POR id----------
    public function getMateriaPorId($id_materia)
    {
        $sentencia = $this->db->prepare("SELECT * FROM materia WHERE id_materia = ?");
        $sentencia->execute(array($id_materia));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getCarreraXnombre($id_carrera, $nombre)
    {
        $sentencia = $this->db->prepare('SELECT materia.nombre, carrera.id_carrera FROM carrera INNER JOIN materia
                    ON carrera.id_carrera = materia.id_carrera WHERE carrera.id_carrera = ? AND materia.nombre = ?');
        $sentencia->execute(array($id_carrera, $nombre));
        $carreras = $sentencia->fetch(PDO::FETCH_OBJ);
        return  $carreras;
    }
        //-----------------------INSERTAR materia ------------------------------------------------     

    function insertarMateria($nombre, $profesor, $id_carrera)
    {
        $sentencia = $this->db->prepare("INSERT INTO materia(nombre,profesor,id_carrera) VALUES(?,?,?)");
        
        $sentencia->execute(array($nombre, $profesor, $id_carrera));

    }
        function getTablaMaterias()
    {
        $sentencia = $this->db->prepare('SELECT * FROM materia');
        $sentencia->execute(array());
        $tablaMaterias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaMaterias;
    }

        //   ------------------------------EDITAR BORRAR MATERIAS----------------------------------------------       

    //BORRAR MATERIA
    public function borrarMateria($id_materia)
    {
        $sentencia = $this->db->prepare("DELETE FROM materia WHERE id_materia=?");
        $sentencia->execute(array($id_materia));
    }

    public function editarMateria($nombre, $profesor, $id_carrera, $id_materia)
    {
        $sentencia = $this->db->prepare("UPDATE `materia` SET `nombre`=?,`profesor`=?,`id_carrera`=? WHERE `id_materia`=?");
        $sentencia->execute(array($nombre, $profesor, $id_carrera, $id_materia));
    }

    function getMaterias(){
        $sentencia = $this->db->prepare('SELECT * FROM materia');
        $sentencia->execute(array());
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
     }
}
