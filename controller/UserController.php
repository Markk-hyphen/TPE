<?php
require_once "./model/UserModel.php";
require_once "./view/UserView.php";

class UserController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }


    function showLogin($action){
        $this->view->renderUserForm($action);
    }

    function showRegistro($action){
        $this->view->renderUserForm($action);
    }

    public function redirectHome(){
        $this->view->showHome();
    }

    public function registrarUsuario($email, $passwd, $nombre){
        $registered = true;
        if (!empty($email) && !empty($nombre)){
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);

        //Hago un try-catch por si el email (primary key) ya existe, si existe displayeo error y si no redirige a home
        try {
            $this->model->insertUser($email, $hashedPasswd, $nombre);
        } catch (Throwable $th) {
            $this->view->renderUserForm("registrar", "El email ya esta registrado");
            $registered = false;
        }

        if ($registered)
            $this->view->renderUserForm('verify', 'Ingresate para terminar el registro');

        }else
            $this->view->renderUserForm("registrar", "No puedes registrar usuarios o mails vacios.");
    }

    public function verifyLogin($email, $password){
        if (!empty($email) && !empty($password)) {
            $user = $this->model->getUser($email);

            if ($user && password_verify($password, $user->passwd)) {

                session_start();
                $_SESSION["email"] = $email;
                $_SESSION['nombre'] = $user->nombre;
                $_SESSION['rol'] = $user->rol;
                $this->view->showHome();
            } else {
                $this->view->renderUserForm("verify", "Datos incorrectos");
            }
        }
    }

    public function logOut(){
        session_start();
        session_destroy();
        $this->redirectHome();
    }

}
