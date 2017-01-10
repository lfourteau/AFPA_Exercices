<?php /*%%SmartyHeaderCode:14539388275847c7d78cae46-82438191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6bfb515919e8f6e4500e89a849378b28161b840' => 
    array (
      0 => '/var/www/html/prestashop2/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1478514348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14539388275847c7d78cae46-82438191',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5847d9ddce6a47_52248681',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5847d9ddce6a47_52248681')) {function content_5847d9ddce6a47_52248681($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//localhost/prestashop2/index.php?controller=search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Rechercher" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Rechercher</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
