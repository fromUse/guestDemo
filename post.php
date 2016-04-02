<?php
/**
*chenq
*2016-3-30
*/
// 引入公共文件
require dirname ( __File__ ) . '/includes/common.inc.php';
// 声明一个常量授权访问includes目录下的公共文件
//当注册flag不存在时值跳转到主页
if(!defined(__REGISTER)){
	require ROOT_PATH.'/index.php';
	exit();
}
define('INC_PHP',true);
//声明样式css关键字常量,用于引入css文件
define('_STYLE', 'post');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
  	  //导入样式css文件
    	require ROOT_PATH.'/includes/title.inc.php';
    ?>
    <title>Title</title>
</head>
<body>
	<div id="test">
                    
	</div>
</body>
</html>
