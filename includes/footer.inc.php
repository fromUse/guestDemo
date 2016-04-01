<?php
/**
 * @author chenq
 * @version 
 */
//此页面是整个网站的公共页面[公共]
//防止恶意调用本页面
//当INC_PHP变量不存在时就直接终止当前页面
if(!defined('INC_PHP')){
	exit('Access Defined!');
}
?>
<div id="footer">
		<p>程序执行耗时 ：<?php echo round(_runtime()-$GLOBALS['_START_TIME'],4) ;?> 秒</p>
		<p>版权所有</p>
		<p>版权所有aaaaaaaaaaaaaaaaaaaaaaaa</p>
</div>
