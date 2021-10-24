<?php

class ComentarioModel
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function comentariosXmateria($id_materia)
    {
        $template = $this->db->prepare("SELECT * FROM comentario WHERE fk_id_materia = ?");
        $template->execute(array($id_materia));
        return $template->fetchall(PDO::FETCH_OBJ);
    }

   /* public function getComentario($id_comentario)
    {
        $comentario = $this->_db->query("SELECT * FROM comentarios WHERE id_comentario = $id_comentario");
        return $comentario->fetch();
    }

    public function getComentariosUsuario($id_usuario)
    {
        $comentarios = $this->_db->query("SELECT * FROM comentarios WHERE id_usuario = $id_usuario");
        return $comentarios->fetchall();
    }

    public function getComentariosNoticia($id_noticia)
    {
        $comentarios = $this->_db->query("SELECT * FROM comentarios WHERE id_noticia = $id_noticia");
        return $comentarios;
    }*/

}