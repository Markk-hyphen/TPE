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


    function showLogin(){
        $this->view->renderLogin();
    }

    function showRegistro(){
        $this->view->renderRegistro();
    }

    public function redirectHome(){
        $this->view->showHome();
    }

    public function modifyRol($clave, $nuevoRol){
        $this->model->updateRol($clave, $nuevoRol);
        $users = $this->model->getUsers();
        $this->view->renderPanel($users);
    }

    public function showPanel(){
        $users = $this->model->getUsers();
        $this->view->renderPanel($users);
    }

    public function registrarUsuario(){

        $registered = true;
        //Atajo de forma personalizada que no se ingresen campos vacios
        $errores_segun_campo_registro = $this->errores_segun_campo($_POST['email'], $_POST['password'], $_POST['nombre']);
        if (!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['password'])){
            $hashedPasswd = password_hash($_POST['password'], PASSWORD_BCRYPT);

        //Hago un try-catch por si el email (primary key) ya existe, si existe displayeo error y si no redirige a home
        try {
            $this->model->insertUser($_POST['email'], $hashedPasswd, $_POST['nombre']);
        } catch (Throwable $th) {
            $this->view->renderRegistro("El email ya esta registrado");
            $registered = false;
        }

        if ($registered)
            $this->view->renderRegistro('Ingresate para terminar el registro');

        }else
            $this->view->renderRegistro("No puedes registrar campos vacios.", $errores_segun_campo);
    }

    private function errores_segun_campo($email, $passwd, $nombre = null){
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

    public function verifyLogin(){
        $errores_segun_campo = $this->errores_segun_campo($_POST['email'], $_POST['password']);
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->model->getUser($_POST['email']);

            $campos_validos = $this->login_check($user, $_POST['password'], $_POST['email'], $errores_segun_campo);
            if ($campos_validos) {
                session_start();
                $_SESSION["email"] = $_POST['email'];
                $_SESSION['nombre'] = $user->nombre;
                $_SESSION['rol'] = $user->rol;
                $this->view->showHome();
            }else
                $this->view->renderLogin("Datos incorrectos", $errores_segun_campo);
        }else
            $this->view->renderLogin("Datos incorrectos", $errores_segun_campo);
    }

    public function login_check($user, $password, $email, &$errores){
        $errores = [];
        $checked = ( $user && password_verify($password , $user->passwd) ) ? true : false;

        if (empty($user))
            $errores = array_merge($errores, array("emailError" => "El email no existe."));
        else
            $errores = array_merge($errores, array("email" => $email));

        if (empty($password) || !$checked)
            $errores = array_merge($errores, array("passwordError" => "Password invalida."));
        
        return $checked;
    }

    public function logOut(){
        session_start();
        session_destroy();
        $this->redirectHome();
    }

}
