<?php 
/**
*chenq
*2016-3-30
*/
//此页面是整个网站的公共页面[公共]
//防止恶意调用本页面
//当INC_PHP变量不存在时就直接终止当前页面
if(!defined('INC_PHP')){
	exit('Access Defined!');
}
?>
<div id="head" >
	<h1>头部信息</h1>
	<ul>
		<li><a href="index.php">首页</a></li>
		<li><a href="register.php">注册</a></li>
		<li>登录</li>
		<li>个人中心</li>
		<li>风格</li>
		<li>管理</li>
		<li>退出</li>
	</ul>
</div>