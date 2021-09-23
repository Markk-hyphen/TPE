<?php
require_once "libs\smarty-3.1.39\libs\Smarty.class.php";

class CarreraView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }
    function showHome(){
        $html='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Informatica Unicen</title>
            <link rel="stylesheet"  href="css/style.css">
        </head>
    <body>
        <header>
                    <h1>CARRERAS</h1>
                    <h2>INFORMATICA</h2>
        </header>';
        echo $html;
    }
    function renderCarreras($carreras){
        foreach($carreras as $carrera){
            
        }
   $html=' <div class="container">
                <div class="carrera"><p>. $carrera->id</p>
                <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select>
                </div>
                <div class="carrera"><p>$</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Tecnicatura Universitaria en Administración de Redes Informáticas</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Profesorado de Informática</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Diplomatura en Experiencias Digitales</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Diplomatura Universitaria en Inteligencia Artificial</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
    </div>
    
    
    <footer>
      <img src="imagenes/logoexactas.png" class="logoexactas">
    </footer>
    
    </body>
    </html>';
     echo $html;
    }

    
}