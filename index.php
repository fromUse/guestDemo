<?php 
/**
*chenq
*2016-3-30
*/
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
    //	include   css
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