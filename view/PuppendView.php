<?php
require_once "libs\smarty-3.1.39\libs\Smarty.class.php";

class PuppendView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function pruebaView(){
        echo "Aca, habla la view pa";
    }
}