<?php
/* Smarty version 3.1.39, created on 2021-09-27 19:25:21
  from 'C:\xampp\htdocs\TrabajoPracticoEspecial\templates\carreras.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6151fe811c2ed2_05220911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d4e0477d8acef644e875a9f70d7dffd283f46cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TrabajoPracticoEspecial\\templates\\carreras.tpl',
      1 => 1632763491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6151fe811c2ed2_05220911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



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
