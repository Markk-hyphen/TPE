<?php
class AuthHelper{

public function __construct(){
    
}

public function checkLoggedIn(){
    session_start();
    $logged = isset($_SESSION['email']);
    session_abort();
    return $logged;
}

public function checkIsAdmin(){
    session_start();
    $isAdmin = ($_SESSION['rol'] == 'admin');
    session_abort();
    return $isAdmin;
}


public function getRol(){
    session_start();
    if (isset($_SESSION['rol'])){
        $rol = $_SESSION['rol'];
    }else
        $rol =  null;
    session_abort();
    return $rol;
}

public function loggedUser(){
    if ($this->checkLoggedIn()){
        $user = $this->createUser();
        return $user;
     }else
        return null;
}

private function createUser(){
    session_start();
    $user = new stdClass();
    $user->email = $_SESSION['email'];
    $user->nombre = $_SESSION['nombre'];
    $user->rol = $_SESSION['rol'];
    session_abort();
    return $user;
}

}