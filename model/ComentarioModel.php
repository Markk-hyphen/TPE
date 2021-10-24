<?php

class ComentarioModel
{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function comentariosXmateria($id_materia){
        $template = $this->db->prepare("SELECT * FROM comentario WHERE fk_id_materia = ?");
        $template->execute(array($id_materia));
        return $template->fetchall(PDO::FETCH_OBJ);
    }

    public function getComentarios(){
        $template = $this->db->prepare("SELECT * FROM comentario");
        $template->execute();
        return $template->fetchall(PDO::FETCH_OBJ);
    }

    public function getComentario($id_comentario){
        $template = $this->db->prepare("SELECT * FROM comentario WHERE id = ?");
        $template->execute(array($id_comentario));
        return $template->fetch(PDO::FETCH_OBJ);
    }

    public function insertComentario($detalle, $fk_id_materia, $fk_email_usuario, $puntaje, $fk_nombre_usuario){
        $template = $this->db->prepare("INSERT INTO comentario (detalle, fk_id_materia, fk_email_usuario, puntaje, fk_nombre_usuario) VALUES (?,?,?,?,?)");
        $template->execute(array($detalle, $fk_id_materia, $fk_email_usuario, $puntaje, $fk_nombre_usuario));
        return $this->db->lastInsertId();
    }

    public function borrarComentario($id){
        $template = $this->db->prepare("DELETE FROM comentario WHERE id = ?");
        $template->execute(array($id));
    }

}