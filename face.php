<?php
/**
*chenq
*2016-3-30
*/
// 引入公共文件
require dirname ( __File__ ) . '/includes/common.inc.php';
// 声明一个常用用授权访问includes目录下的公共文件
define ( 'INC_PHP', true );
//声明样式变量,用于引入css文件
define('_STYLE', 'face');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
			 <?php
			  //导入样式文件
			require ROOT_PATH . '/includes/title.inc.php';
			?>
    <title>头像选择</title>
</head>
<body>
		<div id="pic">
				<h4>头像选择</h4>
				<dl>
				
				<?php for($i=1;$i<12;$i++){?>
				<dd><img src="face/<?php echo $i?>.png" alt="face/<?php echo $i?>.png" title="头像<?php echo $i?>">
				</dd>
				<?php }?>
				
			</dl>
		</div>
</body>
<script type="text/javascript" src="js/change_icon.js"></script>
</html>