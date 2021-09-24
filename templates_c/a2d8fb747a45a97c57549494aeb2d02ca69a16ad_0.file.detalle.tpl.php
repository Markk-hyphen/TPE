<?php
/* Smarty version 3.1.39, created on 2021-09-25 01:37:16
  from 'C:\xampp\htdocs\TPE_backend\TrabajoPracticoEspecialWeb2\templates\detalle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614e612cd1e524_35225941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2d8fb747a45a97c57549494aeb2d02ca69a16ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_backend\\TrabajoPracticoEspecialWeb2\\templates\\detalle.tpl',
      1 => 1632526635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_614e612cd1e524_35225941 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <ul class="list-group">
        <li class="list-group-item mb-3">Materia | <?php echo $_smarty_tpl->tpl_vars['materia']->value->nombre;?>
</li>
        <li class="list-group-item">Profesor | <?php echo $_smarty_tpl->tpl_vars['materia']->value->profesor;?>
</li>
    </ul>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
