<?php
/* Smarty version 3.1.39, created on 2021-09-25 14:53:13
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\materias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614f1bb9bbaa18_09433744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76e34ec47e5ce07745898b7b73cde7a12018c65b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\materias.tpl',
      1 => 1632570759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_614f1bb9bbaa18_09433744 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="d-inline p-2 mb-1">
    <h1 class="display-5"><?php echo $_smarty_tpl->tpl_vars['nombre_carrera']->value;?>
</h1>
    <div class="w-25 ms-2">
    <ul class="list-group">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias']->value, 'materia');
$_smarty_tpl->tpl_vars['materia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
$_smarty_tpl->tpl_vars['materia']->do_else = false;
?>
            <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['materia']->value->nombre;?>
</li><a class="mb-4" href="detalle/<?php echo $_smarty_tpl->tpl_vars['materia']->value->id_materia;?>
">Ver detalle</a>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
