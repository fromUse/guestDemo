<?php
/**
*chenq
*2016-3-30
*
*此文件作用于html引入css文件
*
*/
//防止恶意调用本页面
//当INC_PHP常量不存在时就直接终止当前页面
if(!defined('INC_PHP')){
	exit('Access Defined!');
}
//当_STYLE常量不存在时就直接终止当前页面
//_STYLE常量时用于动态获取页面的css的文件名
if(!defined('_STYLE')){
	exit('Style not fond!');
}


	//导入基础css，也就是整个网站的基础样式[公共]
?>
<link rel="stylesheet" type="text/css"  href="styles/1/basic.css"/>

<?php 
	//导入个性css，也就是某个页面指定的样式[私有]
?>
<link rel="stylesheet" type="text/css"  href="styles/1/<?php echo _STYLE?>.css"/>
