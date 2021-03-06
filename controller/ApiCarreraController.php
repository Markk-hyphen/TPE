<?php
require_once "view/ApiView.php";
require_once "model/CarreraModel.php";

class ApiCarreraController{
    private $model;
    private $view;
    private $allowed_cols = array("nombre", "descripcion");
    public function __construct(){
        $this->view = new ApiView();
        $this->model = new CarreraModel();
    }

    public function getCarreras(){
        $carreras = $this->model->getCarreras();
        if ($carreras)
            $this->view->response($carreras);
        else
            $this->view->response("Vacio", 204);
        
    }

    public function getResource($params = null){
        $id = $params[':ID'];
        $resource = $this->sanitize_column($params[':RESOURCE']);
        $column = $this->model->getColumn($id, $resource);
        if ($column)
            $this->view->response($column);
        else
            $this->view->response("Vacio", 204);
    }

    private function sanitize_column($column){
        if (in_array($column, $this->allowed_cols))
            return $column;
        else
            return $this->allowed_cols[0];
    }

    public function getCarrera($params = null){
        $id = $params[':ID'];
        $carrera = $this->model->getCarrera($id);
        if ($carrera)
           $this->view->response($carrera);
        else
            $this->view->response("La carrera no existe", 404);
    }

    public function insertCarrera(){
        $body = $this->getBody();
        if ($body) {
            $id = $this->model->insertarCarrera($body->nombre, $body->duracion);
            if ($id)
                $this->view->response("Se inserto la tarea", 200);
            else
                $this->view->response("Error al insertar", 500);
        } else
            $this->view->response("Invalid JSON", 400);

    }

    public function borrarCarrera($params = null){
        $id = $params[':ID'];
        $carrera = $this->model->getCarrera($id);
        if ($carrera) {
            $this->model->borrarCarrera($id);
            $this->view->response("Se elimino la carrera", 200);
        } else
            $this->view->response("La carrera no existe", 404);
    }

    public function editarCarrera($params = null){
        $id = $params[':ID'];
        $carrera = $this->model->getCarrera($id);
        //Comprobar si existe la carrera
        if ($carrera) {
            $body = $this->getBody();
            if ($body) {
                $this->model->editarCarrera($body->nombre, $body->duracion, $id);
                $this->view->response("Se edito la carrera", 200);
            } else
                $this->view->response("Invalid JSON", 400);
        } else
            $this->view->response("La carrera no existe", 404);
    }
    

    public function getBody(){
        $body = file_get_contents('php://input');
        return json_decode($body);
    }
}