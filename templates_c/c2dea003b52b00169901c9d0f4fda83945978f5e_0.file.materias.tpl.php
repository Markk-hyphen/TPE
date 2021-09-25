<?php
/* Smarty version 3.1.39, created on 2021-09-25 18:07:06
  from 'C:\xampp\htdocs\TPE_backend\TrabajoPracticoEspecialWeb2\templates\materias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614f492a840536_70348629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2dea003b52b00169901c9d0f4fda83945978f5e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_backend\\TrabajoPracticoEspecialWeb2\\templates\\materias.tpl',
      1 => 1632586011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_614f492a840536_70348629 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
<?php if ($_smarty_tpl->tpl_vars['mostrarTodo']->value) {?>
    <h1 class="display-5"><?php echo $_smarty_tpl->tpl_vars['nombre_carrera']->value;?>
</h1>
<?php } else { ?>
    <h1 class="display-5">Materias</h1>
<?php }?>    
    <ul class="list-group">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias']->value, 'materia');
$_smarty_tpl->tpl_vars['materia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
$_smarty_tpl->tpl_vars['materia']->do_else = false;
?>
            <li class="list-group-item"><a class="mb-4" href="detalle/<?php echo $_smarty_tpl->tpl_vars['materia']->value->id_materia;?>
/<?php echo mb_strtolower(str_replace(' ','-',$_smarty_tpl->tpl_vars['materia']->value->nombre), 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['materia']->value->nombre;?>
</a></li><a class="mb-4" href="detalle/<?php echo $_smarty_tpl->tpl_vars['materia']->value->id_materia;?>
"></a>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
