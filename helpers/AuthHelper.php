<?php
class AuthHelper{

public function __construct(){
    
}

public function checkLoggedIn(){
    session_start();
    return isset($_SESSION['email']);
}

public function getRol(){
    session_start();
    if (isset($_SESSION['rol'])){
        return $_SESSION['rol'];
    }else
        return null;
}

}
