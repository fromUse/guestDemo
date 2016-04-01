<?php
/**
*chenq
*2016-3-30
*/

//此文件用于全局公共变量或者文件

//声明变量存储站点目录，用于下面引用文件时的目录前缀
define('ROOT_PATH', substr(dirname(__FILE__),0,-8));
//引入核心函数库
require ROOT_PATH.'/includes/global.func.php';
//获取文件在执行开始的时间戳
$GLOBALS['_START_TIME'] = _runtime();
?>
