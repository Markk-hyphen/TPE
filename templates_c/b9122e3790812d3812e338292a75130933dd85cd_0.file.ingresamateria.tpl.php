<?php
/* Smarty version 3.1.39, created on 2021-09-28 13:04:21
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\ingresamateria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6152f6b523e9f1_34850733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9122e3790812d3812e338292a75130933dd85cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\ingresamateria.tpl',
      1 => 1632827034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6152f6b523e9f1_34850733 (Smarty_Internal_Template $_smarty_tpl) {
?>
-----------------------------------------------------------------------------------------------

                                       <div class="row mt-4">
     

           <h2>AGREGAR MATERIA</h2>

            <form class="form-alta" action="agregamateria" method="POST"> 
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


                    <label for="nombre">MATERIA</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="profesor">PROFESOR</label>
                    <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>

 </div>
  <?php }
}
