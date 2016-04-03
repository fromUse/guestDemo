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
 2,3,4,5,6,7,8,a,b,c,d,e,f,h,i,j,k,m,n,o,p,q,r,s,t,u,v,w,x,y
);
$code = '';
//计算数组的长度
 $str_length = count($str);
//设置字体
 $font = 6;
//创建一个画布,画布默认颜色是黑色
 $_img = imagecreatetruecolor($width,$height);
 //文字的x,y坐标
 $x = 2;
 $y = 2;
//创建一个指定颜色的画壁[背景]
 $back = imagecolorallocate( $_img,179,179,179);
 //把背景颜色填充到画布
 imagefill($_img,0,0,$back);
  //随机生成字体颜色

  for($i=0;$i<$size;$i++){
    //随机生成y轴的偏移量
  
    $y += mt_rand(-2,$height/5);
    $fontcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
    $index = mt_rand(0,$str_length);
    $code_iten = $str[$index];
    $code .= $code_iten;
    imagestring($_img,$font,$x,$y,$code_iten,$fontcolor);
      $x +=  $width/$size;
  }

  //把验证码保存到session中
    $_SESSION['code'] = $code;
  //在图片上随机添加像素点
 for ($j=0; $j < 200; $j++) 
 {
   $pointcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
   imagesetpixel($_img,mt_rand(0,69),mt_rand(0,69),$pointcolor);
 }

  //给图片画出几条线
  //新建一个线条用的画笔
  $line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
  imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,68),mt_rand(0,24),$line_color);

  $line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
  imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,68),mt_rand(0,24),$line_color);

  $line_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
  imageline($_img,mt_rand(0,10),mt_rand(0,10),mt_rand(0,68),mt_rand(0,24),$line_color);

//把图片输出到浏览器上
 imagepng($_img);
 //最后把资源句柄给释放掉
imagedestroy($_img);
}
?>