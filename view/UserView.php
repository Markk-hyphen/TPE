<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class UserView{
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function renderUserForm($action, $error = null, $errores_segun_campo = null){
        $this->smarty->assign("action", $action);
        $this->smarty->assign("errorXcampo", $errores_segun_campo);
        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/userForm.tpl");
    }

    public function showHome(){
        header("Location: ".BASE_URL."carreras");
    }

}