<?php
/**
*chenq
*2016-3-30
*/
// 引入公共文件
require dirname ( __File__ ) . '/includes/common.inc.php';
// 声明一个常量授权访问includes目录下的公共文件
define ( 'INC_PHP', true );
//声明样式css关键字常量,用于引入css文件
define ( '_STYLE', 'register' );

//开启session
session_start();
//只有$_SESSION['action']存在时
if(isset($_POST['action'])){
	//当有注册提交时执行
	if ($_POST['action'] == 'register') {
		//防止恶意注册，跨站攻击
		//验证码全部是小写
			if(!(strtolower($_POST['checkcode']) == $_SESSION['code'])){
				echo "<script type=\"text/javascript\">alert(\"验证码错误\");history.back();</script>";
				exit();
		}else {
			//actionForm数组用于存储用户提交的表单数据
			$actionForm = array();
			$actionForm['user_name'] = _checkUserName($_POST['user_name']);
			$actionForm['password'] = _checkPassword($_POST['password']);
			$actionForm['notpassword'] = _checkNotPassword($_POST['notpassword'],$_POST['password']);
			$actionForm['pass_ask'] = _checkPass_Ask($_POST['pass_ask']);
			$actionForm['pass_tell'] = _checkPass_Tell($_POST['pass_tell']);
			$actionForm['email'] = _checkEmail($_POST['email']);
			$actionForm['QQ'] = _checkQQ($_POST['QQ']);
			$actionForm['url'] = _checkUrl($_POST['url']);
	}
}
?>
<!DOCTYPE html>
<html lang="cn">
<head>
<meta charset="UTF-8">
		    <?php
		    //导入样式文件
					require ROOT_PATH . '/includes/title.inc.php';
			?>
    <title>注册页面</title>
</head>
<body>
<?php
//导入网页头部
require ROOT_PATH.'/includes/head.inc.php';
?>

<div id="content">
		<h3>会员注册</h3>

		<form method="post" action="register.php" name="register">
		<input type="hidden" name="action"  value="register" />
			<dl>
				<dt>请认真填写内容</dt>
				<dd>用 户 名： <input type="text" name="user_name" class="text">(*必填，至少3位)
				</dd>
				<dd>密　　码：<input type="password" name="password" class="text">(*必填，至少6位)
				</dd>
				<dd>密码确认：<input type="password" name="notpassword" class="text">(*必填，至少6位)
				</dd>
				<dd>密码提示：<input type="text" name="pass_ask" class="text">(*必填，至少5位)
				</dd>
				<dd>密码回答：<input type="text" name="pass_tell" class="text">(*必填，至少4位)
				</dd>
				<dd>
					性 別： <input type="radio" name="sex" value="男" checked="checked">男 <input
						type="radio" name="sex" value="女">女
				</dd>
				<dd>
					<img src="face/2.png" alt="头像选择" class="face" id="face_img">
				</dd>
					<dd><input type='hidden'  name="img_tag" ></dd>
				<dd>
					电子邮件：<input type="email" name="email" class="text">(* 必填 )
				</dd>
				<dd>
					Q　　Q ：<input type="text" name="QQ" class="text">( 选填 )
				</dd>
				<dd class="url">
					个人主页 ：<input type="text" name="url" value="http://" class="text">
				</dd>
				<dd class="url"   >
					验 证 码 ：<input type="text" name="checkcode" class="text code" id="code">
					<img src="code.php" id="code_img">
				</dd>
				<dd>
					<input type="submit" value="注册" class="'text" id="submit">
				</dd>
			</dl>
		</form>
	</div>
<?php
//导入网页脚部
require ROOT_PATH .'/includes/footer.inc.php';

?>
</body>
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/change_icon.js"></script>
</html>
