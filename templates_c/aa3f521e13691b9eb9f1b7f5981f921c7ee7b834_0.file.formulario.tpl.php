<?php
/* Smarty version 3.1.39, created on 2021-09-27 17:55:04
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6151e95873d534_07583674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3f521e13691b9eb9f1b7f5981f921c7ee7b834' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\formulario.tpl',
      1 => 1632758102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6151e95873d534_07583674 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
--------------------------------------------------------------
                               
<div class="container">
   <div class="row mt-4">
        <div class="col-md-4">

           <h2>CARRERA</h2>

            <form class="form-alta" action="agregarcarrera" method="post"> 
                     <label for="nombre">Nombre de LA CARRERA</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                 <label for="duracion">duracion</label>
                 <input placeholder="duracion" type="text" name="duracion" id="duracion" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>


----------------------------------------------------------------------------------
                                          <div class="row mt-4">
        <div class="col-md-4">

           <h2>BORRAR CARRERA</h2>

            <form class="form-alta" action="borrarcarrera" method="post"> 
                <select name="id_carrera">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carreras']->value, 'carrera');
$_smarty_tpl->tpl_vars['carrera']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
$_smarty_tpl->tpl_vars['carrera']->do_else = false;
?>
                       <option value="<?php echo $_smarty_tpl->tpl_vars['carrera']->value->id_carrera;?>
"><?php echo $_smarty_tpl->tpl_vars['carrera']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                     
    
                <button type="submit" class="btn btn-primary">BORRAR</button>
            </form>
        </div>
    </div>


 ------------------------------------------------------
                                       <div class="row mt-4">
        <div class="col-md-4">

           <h2>MATERIA</h2>

            <form class="form-alta" action="agregarmateria" method="POST"> 
                <select name="id_carrera">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carreras']->value, 'carrera');
$_smarty_tpl->tpl_vars['carrera']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
$_smarty_tpl->tpl_vars['carrera']->do_else = false;
?>
                       <option value="<?php echo $_smarty_tpl->tpl_vars['carrera']->value->id_carrera;?>
"><?php echo $_smarty_tpl->tpl_vars['carrera']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>


                    <label for="nombre">Nombre de la materia</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="profesor">Profesor</label>
                    <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
 </div>
  



--------------------------------
----------------------------------------------------------------------------------
                                          <div class="row mt-4">
        <div class="col-md-4">

           <h2>BORRAR MATERIA</h2>

            <form class="form-alta" action="borrarmateria" method="post"> 
                <select name="id_materia">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias']->value, 'materia');
$_smarty_tpl->tpl_vars['materia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
$_smarty_tpl->tpl_vars['materia']->do_else = false;
?>
                       <option value="<?php echo $_smarty_tpl->tpl_vars['materia']->value->id_materia;?>
"><?php echo $_smarty_tpl->tpl_vars['materia']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                     
    
                <button type="submit" class="btn btn-primary">BORRAR</button>
            </form>
        </div>
    </div>


 ------------------------------------------------------



<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
