<?php /* Smarty version Smarty-3.1.19, created on 2016-12-08 16:42:09
         compiled from "/var/www/html/prestashop2/admin2112/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171346738258497f51860413-43335623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbd4d6b7cda8a42a21e6033303d09c135bdcf5be' => 
    array (
      0 => '/var/www/html/prestashop2/admin2112/themes/default/template/content.tpl',
      1 => 1478514344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171346738258497f51860413-43335623',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58497f51861ae3_96597329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58497f51861ae3_96597329')) {function content_58497f51861ae3_96597329($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
