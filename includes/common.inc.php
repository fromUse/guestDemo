<?php
/**
*chenq
*2016-3-30
*/


//版本判断，版本低于PHP5.0的不给运行，一般用于部署服务器的时候才会用到
if(PHP_VERSION <'5.0.0'){
	exit('Version is to Low');
}
//此文件用于全局公共变量或者文件

//声明变量存储站点目录，用于下面引用文件时的目录前缀
define('ROOT_PATH', substr(dirname(__FILE__),0,-8));
//引入核心函数库
require ROOT_PATH.'/includes/global.func.php';
//获取文件在执行开始的时间戳
$GLOBALS['_START_TIME'] = _runtime();
?>
