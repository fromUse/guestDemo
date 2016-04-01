<?php
/**
*chenq
*2016-3-30

*/
/**
 * 
 * 函数的功能是获取当前时间戳
 * @return float 返回值是一个浮点类型的数值
 */
function _runtime(){
	$time_arry = explode(' ', microtime());
	return $time_arry[0]+$time_arry[1];
}
?>