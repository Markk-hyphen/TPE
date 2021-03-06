<?php

class ApiView{

    public function __construct(){
        
    }

    public function response($data, $status = 200) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }


    private function _requestStatus($code){
        $status = array(
            200 => "OK",
            204 => "No Content",
            404 => "Not found",
            500 => "Internal Server Error",
            501 => "Internal Error web"
          );
    }
}