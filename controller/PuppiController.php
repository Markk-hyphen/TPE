<?php
require_once "model\PuppendModel.php";
require_once "view\PuppendView.php";

class PuppiController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new PuppendModel();
        $this->view = new PuppendView();
    }

    public function __destruct(){
        $this->model = null;
        $this->view = null;
    }

    public function testingController(){
        echo "Llamando desde el controller al resto de pichones";
        echo "<br>";
        $this->model->pruebaPupiModel();
        echo "<br>";
        $this->view->pruebaView();
        echo "<br>";
    }
}