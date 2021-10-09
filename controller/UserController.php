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

    public function registrarUsuario(){

        $registered = true;
        $errores_segun_campo = $this->errores_segun_campo($_POST['email'], $_POST['password'], $_POST['nombre']);
        if (!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['password'])){
            $hashedPasswd = password_hash($_POST['password'], PASSWORD_BCRYPT);

        //Hago un try-catch por si el email (primary key) ya existe, si existe displayeo error y si no redirige a home
        try {
            $this->model->insertUser($_POST['email'], $hashedPasswd, $_POST['nombre']);
        } catch (Throwable $th) {
            $this->view->renderUserForm("registrar", "El email ya esta registrado");
            $registered = false;
        }

        if ($registered)
            $this->view->renderUserForm('verify', 'Ingresate para terminar el registro');

        }else
            $this->view->renderUserForm("registrar", "No puedes registrar campos vacios.", $errores_segun_campo);
    }

    private function errores_segun_campo($email, $passwd, $nombre){
        $errores = [];
        if (empty($email))
            $errores = array_merge($errores, array("emailError" => "Mail invalido."));
        else
            $errores = array_merge($errores, array("email" => $email));

        if (empty($passwd))
            $errores = array_merge($errores, array("passwordError" => "Password invalida."));
        else
            $errores = array_merge($errores, array("password" => $passwd));

        if (empty($nombre))
            $errores = array_merge($errores, array("nombreError" => "Nombre invalido."));
        else
            $errores = array_merge($errores, array("nombre" => $nombre));

        return $errores;
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
        }else
            $this->view->renderUserForm("verify", "Datos incorrectos");
    }

    public function logOut(){
        session_start();
        session_destroy();
        $this->redirectHome();
    }

}
