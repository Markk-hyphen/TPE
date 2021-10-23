<?php
require_once "view/ApiView.php";
require_once "model/MateriaModel.php";

class ApiMateriaController{
    private $model;
    private $view;
    public function __construct(){
        $this->model = new MateriaModel();
        $this->view = new ApiView();
    }

    public function getMaterias(){
       $materias = $this->model->getMaterias();
       if($materias)
           $this->view->response($materias, 200);
        else
            $this->view->response("No hay materias", 404);
    }

    public function getMateria($params = null){
        $id = $params[':ID'];
        $materia = $this->model->getMateria($id);
        if($materia)
            $this->view->response($materia, 200);
        else
            $this->view->response("La materia no existe", 404);
    }

    public function insertMateria(){
        $body = $this->getBody();
        if (!$this->materiaHasCareer($body->id_carrera, $body->nombre)){
            $this->check_carrera_asociada($body);
            $id = $this->check_carrera_asociada($body);;
            if($id)
                $this->view->response("La materia con id = $id fue insertada", 200);
            else
                $this->view->response("La carrera asociada no existe", 500);
        }
        else
            $this->view->response("La materia ya existe", 409);

    }

    private function check_carrera_asociada($materia){
        try {
            return $this->model->insertarMateria($materia->nombre, $materia->profesor, $materia->id_carrera);
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function borrarMateria($params = null){
        $id = $params[':ID'];
        $materia = $this->model->getMateria($id);
        if($materia) {
            $this->model->borrarMateria($id);
            $this->view->response("La materia con id = $id fue borrada", 200);
        }
        else
            $this->view->response("La materia no existe", 404);
    }

    public function editarMateria($params = null){
        $id = $params[':ID'];
        $body = $this->getBody();
        $materia = $this->model->getMateria($id);
        if($materia) {
            $this->model->editarMateria($body->nombre, $body->profesor, $body->id_carrera, $id);
            $this->view->response("La materia con id = $id fue editada", 200);
        }
        else
            $this->view->response("La materia no existe", 404);
    }
    
    public function getBody(){
        $body = file_get_contents('php://input');
        return json_decode($body);
    }
    
    private function materiaHasCareer($id_carrera, $nombre){
        $carreras=$this->model->getCarreraXnombre($id_carrera, $nombre);
        return !empty($carreras);
    }
}