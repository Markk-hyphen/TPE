<?php
/* Smarty version 3.1.39, created on 2021-10-01 15:14:25
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\editarborrarcarrera.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615709b19847f4_11499974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8bb60cda28c44e3e6154d3fde3c631f51d43b4e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\editarborrarcarrera.tpl',
      1 => 1633094063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_615709b19847f4_11499974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>             
                           <h1> EDITAR Y BORRAR CARRERA</h1>
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>
        <th style="border: 3px solid #73568C">Carrera</th> 
        <th style="border: 3px solid #73568C">Duracion</th>
        <th style="border: 3px solid #73568C">BORRAR</th>
        <th style="border: 3px solid #73568C">EDITAR</th>


     </tr>

    </thead>

  
   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablaCarreras']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <form class="form-alta" action="editarcarrera/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_carrera;?>
" method="POST"> 

          <tr style=text-align:center>
      
 
            <td style='border: 3px solid #73568C'><input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>
"></td>
            <td style='border: 3px solid #73568C'><input type="number" name="duracion" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->duracion;?>
"></td>
          
            <td style='border: 3px solid #73568C'><a class="btn btn-primary" id="borrar" href="borrarcarrera/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_carrera;?>
">borrar</a></td>
            <td style='border: 3px solid #73568C'><button type="submit" class="btn btn-primary">editar</button></td>
        
    </form>
         </tr>
 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>
      <h4><?php echo $_smarty_tpl->tpl_vars['aviso']->value;?>
</h4>


<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

         <?php }
}
