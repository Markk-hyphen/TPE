<?php
require_once "model\PuppiModel.php";
require_once "view\PuppiView.php";

class PuppiController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new PuppiModel();
        $this->view = new PuppiView();
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