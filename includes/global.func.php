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

/**
*
* 此函数生成验证码
*
*/
function  _code( $width = 70,$height = 23,$size = 4 ){

	session_start();
	header('Content-type:image/png');
	//搜集验证码数据源
	$str = array(
	 3,4,5,6,7,8,
	 a,b,c,d,e,f,h,i,j,k,m,n,o,p,r,s,t,u,v,w,x,y,
	 A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z
	);
	$code = '';
	//计算数组的长度
	 $str_length = count($str);
	//设置字体
	 $fontsize = 20;
	//创建一个画布,画布默认颜色是黑色
	 $_img = imagecreatetruecolor($width,$height);
	 //文字的x,y坐标
	 $x = $width/8;
	 $y = $fontsize;
	//创建一个指定颜色的画壁[背景]
	 $back = imagecolorallocate( $_img,221,240,237);
	 //把背景颜色填充到画布
	 imagefill($_img,0,0,$back);
		//随机生成字体颜色

		for($i=0;$i<$size;$i++){
			//随机生成y轴的偏移量

			$y += mt_rand(-($height-$fontsize)/6,($height-$fontsize)/3);
			$fontcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
			$index = mt_rand(0,$str_length);
			$code_iten = $str[$index];
			$code .= $code_iten;
			imagettftext($_img,$fontsize,0,$x,$y,$fontcolor,ROOT_PATH.'/ttf/Jackey_Egypt.ttf',$code_iten);
			$x +=  $width/8+($width/16);
		}

		//把验证码保存到session中
		//保存到session的全部小写
			$_SESSION['code'] = strtolower($code);
		//在图片上随机添加像素点
	 for ($j=0; $j <40*$size; $j++)
	 {
		 $pointcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
		 imagesetpixel($_img,mt_rand(0,$width),mt_rand(0,$height),$pointcolor);
	 }

		//给图片画出几条线
		//新建一个线条用的画笔
		$line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,$width-10),mt_rand(0,$height/4),$line_color);

		$line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,$width-10),mt_rand(0,$height/4),$line_color);

		$line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,$width-10),mt_rand(0,$height/4),$line_color);

	//把图片输出到浏览器上
	 imagepng($_img);
	 //最后把资源句柄给释放掉
	imagedestroy($_img);
}


/**
*
* 此函数用于弹出提示，并返回上一个页面
* @return void
*/

function _callbackPage($msg){
		echo "<script type=\"text/javascript\">alert(\"$msg\");history.back();</script>";
}

/**
*
* 此函数用于验证表单中的用户是否合法与过滤
* 包括去除头尾空格，判断用户名长度和特殊字符
*	@param string user_name
* @return string
*/
function _checkUserName($user_name,$min=3,$max=20){
		$user_name = trim($user_name);
		$modle = "/[\<\>\ \^\@\!\%\#\*\(\)\-\=\+\《\》　]/";//特殊字符正则模式

		if(mb_strlen($user_name,'utf-8')<$min || mb_strlen($user_name,'utf-8')>$max)
		{
			_callbackPage('用户名长度不合法');
			exit();
		}else if(preg_match($modle,$user_name))
		{
			_callbackPage('\< \> 空格 \^ \@ \! \% \# \* \( \) \- \= \+ \《 \》　\n用户名不能包含以上特殊字符');
			exit();
		}

		//把字符串先进行转义再返回
		//mysqli_real_escape_string($user_name);
		return $user_name;
}

/**
*
* 此函数用于验证表单中的用户密码是否合法
* 判断用户密码长度
*	@param string  password
* @param int min
* @param int max
* @return string
*/
function _checkPassword($password,$min=6,$max=16){

		if(mb_strlen($password,'utf-8') < 6 || mb_strlen($password,'utf-8') > 16){
				_callbackPage('密码长度不能小于６位或大于16位');
					exit();
		}
		//给密码字符串进行ｍｄ5加密
		return md5($password);
}

/**
*
* 此函数用于验证表单中的用户密码是否合法
* 判断确认密码和密码是否一致
*	@param string  password
* @param string  notpassword
* @return string
*/
function _checkNotPassword($notpassword,$password){

		if(md5($notpassword) != md5($password)){
					_callbackPage('密码不一致');
					exit();
		}
		//给密码字符串进行ｍｄ5加密
		return md5($notpassword);
}

/**
*
* 此函数用于验证表单中的用户密码提示
*	@param string  pass_ask
* @return string
*/
function _checkPass_Ask($pass_ask){

		if(mb_strlen($pass_ask,'utf-8') < 5 || mb_strlen($pass_ask,'utf-8') > 30){
				_callbackPage('密码提示必须在５～30字内');
					exit();
		}
		//给密码提示字符串进行转义
		return mysqli_real_escape_string($pass_ask);
}


/**
*
* 此函数用于验证表单中的用户密码回答
*	@param string  pass_tell
* @return string
*/
function _checkPass_Tell($pass_tell){
			if(mb_strlen($pass_tell,'utf-8') < 1){
				_callbackPage('密码回答必须填');
				exit();
			}else if (mb_strlen($pass_tell,'utf-8') > 20) {
				_callbackPage('密码回答在1～２0字内');
				exit();
			}
			//给密码提示字符串进行转义
			return mysqli_real_escape_string($pass_tell);
}


/**
*
* 此函数用于验证表单中的邮件地址
*	@param string  email
* @return string
*/
function _checkEmail($email){
		//邮件验证正则模式
		$model = '/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/';

		if(empty($email)){
			if(!preg_match($model,$email)){
				_callbackPage('邮箱地址不合法');
				exit();
			}

		}
		return $email;
}
/**
*
* 此函数用于验证表单中的邮件地址
*	@param string  QQ
* @return string
*/
function _checkQQ($QQ){
		//验证QQ正则模式
		$model = '/^[1-9]{1}[0-9]{4,9}$/';
		if(!empty($QQ)){
			if(!preg_match($model,$QQ)){
				_callbackPage('QQ账户不正确');
				exit();
			}
		}

		return $QQ;
}

/**
*
* 此函数用于验证表单中的邮件地址
*	@param string  QQ
* @return string
*/
function _checkUrl($url){
		//验证QQ正则模式
		$model = '/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/';
		if(!empty($url)){
			if(!preg_match($model,$url)){
				_callbackPage('url地址不合法');
				exit();
			}
		}

		return $url;
}
?>
