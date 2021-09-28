<?php
/* Smarty version 3.1.39, created on 2021-09-28 15:08:09
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\editarborrarmateria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615313b97a7590_78051514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e800b3b0924aba68b2cc9a5d0c27e35eec71b868' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\editarborrarmateria.tpl',
      1 => 1632834487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_615313b97a7590_78051514 (Smarty_Internal_Template $_smarty_tpl) {
?>                  <h1> EDITAR Y BOORRAR MATERIA</h1>
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>

      <th style="border: 3px solid #73568C">id_materia</td> 
      <th style="border: 3px solid #73568C">nombre</th> 
      <th style="border: 3px solid #73568C">profesor</th>
      <th style="border: 3px solid #73568C">id_carrera</th>
       <th style="border: 3px solid #73568C">borrar</th>
       <th style="border: 3px solid #73568C">EDITAR</th>


     </tr>

     </thead>
   <tr style=text-align:center>
   <form class="form-alta"  method="get"> 
   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablaMaterias']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            
         <td style='border: 3px solid #73568C '><input type="text" name="id_materia" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value->id_materia;?>
"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="nombre" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>
"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="profesor" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value->profesor;?>
"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="id_carrera" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value->id_carrera;?>
"></td>
         <td style='border: 3px solid #73568C'><a class="btn btn-primary" href="borrarmateria/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_materia;?>
">borrar</a></td>
          <td style='border: 3px solid #73568C'><a class="btn btn-primary" href="tabla/editarmateria/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_materia;?>
">editar</a>
         </td>
     </form>
         </tr>
 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
