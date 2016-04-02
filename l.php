<?php

 header('Content-type:image/png');
//搜集验证码数据源
$str = array(
  2,3,4,5,6,7,8,a,b,c,d,e,f,h,i,j,k,m,n,o,p,q,r,s,t,u,v,w,x,y
);
//计算数组的长度
  $str_length = count($str);
//设置字体大小
  $fontsize = 20;
//创建一个画布,画布默认颜色是黑色
  $_img = imagecreatetruecolor(72,25);
  //文字的x,y坐标
  $x = 2;
  $y = 2;
//创建一个指定颜色的画壁[背景]
  $back = imagecolorallocate($_img,179,179,179);
  //把背景颜色填充到画布
  imagefill($_img,0,0,$back);
   //随机生成字体颜色

   for($i=0;$i<4;$i++){
     //随机生成y轴的偏移量
     $x += 13;
     $y += mt_rand(-2,2);
     $fontcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
     $index = mt_rand(0,$str_length);
     imagestring($_img,$fontsize,$x,$y,$str[$index],$fontcolor);
   }
   //在图片上随机添加像素点
  for ($j=0; $j < 200; $j++) {
    $pointcolor = imagecolorallocate($_img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
    imagesetpixel($_img,mt_rand(0,69),mt_rand(0,69),$pointcolor);
  }
//把图片输出到浏览器上
  imagepng($_img);
  //最后把资源句柄给释放掉
 imagedestroy($_img);

 ?>
