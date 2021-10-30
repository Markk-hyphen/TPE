<?php
require_once "model\MateriaModel.php";
require_once "view\MateriaView.php";
require_once "helpers/AuthHelper.php";
require_once "model/CarreraModel.php";
require_once "model/ComentarioModel.php";

class MateriaController {
    private $model;
    private $view;
    private $helper;
    private $carrera_model;
    private $comentario_model;
    private $max_size;
    private $paginas;
    private $materias_x_pagina_default = 7;
    private $materias_x_pagina;
    private $pagina_actual;

    public function __construct($max_size = 1000000, $materias_x_pagina = 7) {
        $this->model = new MateriaModel();
        //Necesito datos de las carreras para una query, antes que repetir codigo preferi instanciar un objeto CarreraModel
        $this->carrera_model = new CarreraModel();
        $this->view = new MateriaView();
        $this->comentario_model = new ComentarioModel();
        $this->helper = new AuthHelper();
        $this->max_size = $max_size;
        $this->setPaginationParams($materias_x_pagina);
    }   

    private function setPaginationParams($materias_x_pagina){
        $table_size = $this->model->table_size();
        if ($table_size < $materias_x_pagina && $materias_x_pagina < 0){ 
            $this->paginas = ceil($table_size / $this->paginas_default);
            $this->materias_x_pagina = $this->materias_x_pagina_default;
        }
        else {
            $this->paginas = ceil($table_size / $materias_x_pagina);
            $this->materias_x_pagina = $materias_x_pagina;
        }

    }

    public function filtrarMateria($id_materia, $nombre){
        if ($this->model->getMateria($id_materia)){
            $loggedUser = $this->helper->loggedUser();
            $materia = $this->model->getMateria($id_materia);
            $comentarios = $this->comentario_model->comentariosXmateria($id_materia);
            $this->view->renderMateria($materia, $comentarios, $loggedUser);
        }else
            $this->redirectHome();   
    }

    public function formMateria(){
        if ($this->helper->checkLoggedIn()) {
            $carreras = $this->carrera_model->getCarreras();
            $this->view->renderFormMateria($carreras);

        }else
            $this->redirectHome();
    }
    
    public function insertMateria(){
        if ($this->helper->checkLoggedIn()) {
            if ( isset($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']) )  
            //Compruebo que la materia no tenga ya una carrera asociada
                if ( !$this->materiaHasCareer() )
                    $this->model->insertarMateria($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
        }
        $this->redirectHome();

        }

    private function materiaHasCareer(){
        $carreras=$this->model->getCarreraXnombre($_POST['id_carrera'], $_POST['nombre']);
        return !empty($carreras);
    }

    public function materias(){
        $this->materiasPagination([':PAGINA' => 1]);
    }

    public function materiasPagination($params = null){
        $pagina = $this->check_page($params[':PAGINA']);
        $materias = $this->model->materiasPaginadas($pagina, $this->materias_x_pagina);
        $this->view->renderMaterias($materias, $this->paginas, $pagina);
    }

    private function check_page($page){
        if (isset($page) && is_numeric($page)){
            if ($page > $this->paginas)
                return $this->paginas;
            if ($page > 0)
                return $page;
        }
        return 1;
    }

    //------------------------------EDITAR BORRAR MATERIAS----------------------------------------------
       //mostrar tabla materias:
    public function tablaMaterias(){
        $tablasMaterias=$this->model->getTablaMaterias();  //traigo el id y el nombre de la base de datos para el select
        $this->view->rendertablaMateria($tablasMaterias, $this->helper->checkLoggedIn());
    }

    public function borrarMateria($id){
       if ($this->helper->checkLoggedIn())
           $this->model->borrarMateria($id);
       $this->view->showTablaLocationMateria();
    }

    public function modificarMateria($id_materia){
        if ($this->helper->checkLoggedIn())
            $this->model->editarMateria($_POST['nombre'], $_POST['profesor'],$_POST['id_carrera'],$id_materia);
        $this->view->showTablaLocationMateria();
    }

    public function uploadFile($params = null){
        if ($this->helper->checkIsAdmin() && $this->valid_file()){
            $filePath = "uploads/" . uniqid("", false) . "."
                                   . strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));
            move_uploaded_file($_FILES['input_name']['tmp_name'], $filePath);
            $this->model->uploadFile($params[":ID"], $filePath);
            $this->goBack();
        }//else
            //$this->view->showTablaLocationMateria();
    }

    public function valid_file(){
        $file = $_FILES['input_name'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_parts));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($file_ext, $allowed))
            if ($file_error === 0)
                if ($file_size <= $this->max_size)
                    return true;
                else
                    echo "El archivo es demasiado grande";

            else
                echo "Error al subir el archivo";
            
        else
            echo "Extension invalida";
        
        return false;
    }

    public function deleteFile($params = null){
        if ($this->helper->checkIsAdmin())
            $this->model->deleteFile($params[":ID"]);
        $this->goBack();    
        }
        
    private function goBack(){
        //Navigate back para que vuelva a la misma pagina
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function redirectHome(){
        $this->view->showHome();
    }

}