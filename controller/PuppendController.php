<?php
require_once "model\PuppendModel.php";
require_once "view\PuppendView.php";

class PuppendController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new PuppendModel();
        $this->view = new PuppendView();
    }

    // public function __destruct(){
    //     $this->model = null;
    //     $this->view = null;
    // }                                     ->  NO SE PARA Q ES ESTO
    function showHome (){
       
       //mostrar los animales
         $animales= $this->model->getAnimals($animales);
         //mostrar los animales en la vista
         $this->view->renderAnimals($animales);
    }

}