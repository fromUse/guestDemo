<?php 
/**
*chenq
*2016-3-30
*/
//版本判断，版本低于PHP5.0的不给运行，一般用于部署服务器的时候才会用到
if(PHP_VERSION <'5.0.0'){
	exit('Version is to Low');
}
//声明一个常用用授权访问includes目录下的公共文件
define('INC_PHP',true);

//引入公共文件
require dirname(__File__).'/includes/common.inc.php';

//声明样式变量,用于引入css文件
define('_STYLE', 'index');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php 
    	require ROOT_PATH.'/includes/title.inc.php';
    ?>
</head>
<body>
<?php require ROOT_PATH.'/includes/head.inc.php';?>

<div id="user">  
		<h3>用户信息</h3>
</div>

<div id="list">
		<h3>文章区域</h3>
</div>

<div id="pics">
	<h3>图片区域</h3>
</div>

<?php require ROOT_PATH .'/includes/footer.inc.php';?>	
</body>
</html>