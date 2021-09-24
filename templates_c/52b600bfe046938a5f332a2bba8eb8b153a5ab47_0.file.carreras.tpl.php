<?php
/* Smarty version 3.1.39, created on 2021-09-25 00:01:41
  from 'C:\xampp\htdocs\TPE_backend\TrabajoPracticoEspecialWeb2\templates\carreras.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614e4ac53d52f5_23598704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52b600bfe046938a5f332a2bba8eb8b153a5ab47' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_backend\\TrabajoPracticoEspecialWeb2\\templates\\carreras.tpl',
      1 => 1632520422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_614e4ac53d52f5_23598704 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <header>
                <h1>CARRERAS</h1>
                <h2>INFORMATICA</h2>
    </header>

<div class="container">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carreras']->value, 'carrera');
$_smarty_tpl->tpl_vars['carrera']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
$_smarty_tpl->tpl_vars['carrera']->do_else = false;
?>
                <div class="carrera">
                    <a href="carrera/<?php echo str_replace(' ','-',$_smarty_tpl->tpl_vars['carrera']->value->nombre);?>
/<?php echo $_smarty_tpl->tpl_vars['carrera']->value->id_carrera;?>
"><p><?php echo $_smarty_tpl->tpl_vars['carrera']->value->nombre;?>
</p></a>
                </div> 
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    
<?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
