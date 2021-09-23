<?php
<?php 
require_once('libs/smarty/Smarty.class.php');

function showMamiferos($animales) {
  $mamiferos = array(); // arreglo para guardar solo los mamiferos

  foreach($animales as $animal) {
     if(es_mamifero($animal))
        array_push($mamiferos, $animal);
  }

  // inicializo Smarty y asigno las variables para mostrar
  $smarty = new Smarty();
  $smarty->assign('titulo',”Lista de mamíferos”);
  $smarty->assign('animales', $mamiferos);

  $smarty->display('templates/animales.tpl'); // muestro el template   
}
