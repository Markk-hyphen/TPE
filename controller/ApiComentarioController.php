<?php
require_once 'model/ComentarioModel.php';
require_once 'view/ApiView.php';

class ApiComentarioController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ComentarioModel();
        $this->view = new ApiView();
    }

    public function getComentarios() {
        $comentarios = $this->model->getComentarios();
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response('No content', 204);
    }
    
    public function getByPuntaje($params = null){
        $comentarios = $this->model->comentariosXpuntaje($params[':ID'], $params[':puntaje']);
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response('No content', 204);
    }

    public function getByOrder($params = null){
        if ($params[':ORDER'] == 'asc')
            $comentarios = $this->model->comentariosXordenAsc($params[':ID']);
        else
            $comentarios = $this->model->comentariosXordenDesc($params[':ID']);

        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response('No content', 204);
    }

    public function getByOrderedColumn($params = null){
        if ($params[':ORDER'] == 'asc')
            $comentarios = $this->model->comentariosXordenAsc($params[':ID'], $params[':COLUMN']);
        else
            $comentarios = $this->model->comentariosXordenDesc($params[':ID'], $params[':COLUMN']);

        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response('No content', 204);
        }

    public function getComentario($params = null) {
        $comentario = $this->model->getComentario($params[':ID']);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response('Comentario inexistente', 404);
    }

    public function insertComentario() {
        $body = $this->getBody();
        if ($body) {
            $id = $this->check_comentario($body);
            if ($id) {
                $comentario = $this->model->getComentario($id);
                $this->view->response($comentario, 200);
            } else
                $this->view->response('Algunos de los datos asociados son incorrectos', 500);
        } else
            $this->view->response('Invalid request', 400); 
    }

    private function check_comentario($comentario){
        try {
            $id = $this->model->insertComentario($comentario->detalle, $comentario->fk_id_materia, $comentario->fk_email_usuario, $comentario->puntaje, $comentario->fk_nombre_usuario);
            return $id;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function borrarComentario($params = null){
        $comentario = $this->model->getComentario($params[':ID']);
        if ($comentario) {
            $this->model->borrarComentario($params[':ID']);
            $this->view->response('Comentario borrado', 200);
        } else
            $this->view->response('Comentario inexistente', 404);
    }

    public function getBody(){
        $body = file_get_contents('php://input', true);
        return json_decode($body);
    }

    public function getComentariosMateria($params = null){
        $comentarios = $this->model->comentariosXmateria($params[':ID']);
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response('Materia inexistente', 404);
    }
}
