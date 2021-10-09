<?php

class UserModel{
    private $db;
    
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_carreras;charset=utf8', 'root', '');
    }

    public function insertUser($email, $passwd, $nombre, $rol = 'usuario'){
        $template = $this->db->prepare("INSERT INTO usuario(email, passwd, nombre, rol) VALUES(?, ?, ?, ?)");
        $template->execute(array($email, $passwd, $nombre, $rol));
    }

    public function getUser($email){
        $template = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $template->execute(array($email));
        return $template->fetch(PDO::FETCH_OBJ);
    }
}