<?php
/* Smarty version 3.1.39, created on 2021-09-29 16:07:47
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\detalle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61547333295af5_10482324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23a157f9a0990bfda5a666c0d94291dc11d5bb92' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\detalle.tpl',
      1 => 1632872249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_61547333295af5_10482324 (Smarty_Internal_Template $_smarty_tpl) {
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
<a href="../<?php echo $_smarty_tpl->tpl_vars['materia']->value->id_carrera;?>
">Volver</a>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
