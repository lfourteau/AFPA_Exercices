<?php /* Smarty version Smarty-3.1.19, created on 2016-12-08 16:42:09
         compiled from "/var/www/html/prestashop2/admin2112/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13344637958497f5188da27-39690501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95f1db8220fcd0eb5de7033f95a7dc30309072a0' => 
    array (
      0 => '/var/www/html/prestashop2/admin2112/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1478514344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13344637958497f5188da27-39690501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58497f5188e200_29943644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58497f5188e200_29943644')) {function content_58497f5188e200_29943644($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
