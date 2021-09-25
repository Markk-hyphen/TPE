<?php
/* Smarty version 3.1.39, created on 2021-09-25 16:30:57
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614f32a167a7f8_08254268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3f521e13691b9eb9f1b7f5981f921c7ee7b834' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\formulario.tpl',
      1 => 1632580255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_614f32a167a7f8_08254268 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">

                                <h2>INSERTAR CARRERA</h2>
           <form class="form-alta" action="administrador" method="POST"> 

            <label for="carrera">id_Carrera</label>
                <input placeholder="id_carrera" type="text" name="id_carrera" id="id_carrera" required>
   
             <label for="">Nombre de la materia</label>
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="">Profesor</label>
                <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
  


<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
