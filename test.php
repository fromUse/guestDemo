<?php
/**
*chenq
*2016-3-31
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
		<div>
				<ul id="aa">
						<li id="aaa">0</li>
						<li>1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
						<li>5</li>
				</ul>
				<ul>
						<li id="bb">000</li>
						<li>111</li>
						<li>222</li>
						<li>333</li>
						<li>444</li>
						<li>555</li>
				</ul>


				<button id="bt1">click1</button>
				<button id="bt2">click2</button>
		</div>
</body>
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
//获取表单input标签的文本内容关键字是value / val [属性值]
//获取html普通标签li dd tb tr hr a等标签的文本用关键字innerHTML [标签里面的内容]
//获取容器标签div 文本内容通过text / html关键字 [标签里面的内容]
//获取ul li dt dd的等标签一般是返回一个数组

		var li = $('#tag li');
		$('#bt1').click(function(){
		//获取li标签集合中的值要用li[index]指定下标
			//获取标签的文本内容通过innerHTML获取
			//	alert(li[1].text);//有反应 获取不到
			//	alert(li[1].text());//没反应 获取不到
			//	alert(li[0].value);//有反应 获取到
			//	alert(li[0].value);//有反应 获取到
		});
		var ul = $('ul');
		$('bt2').click(function(){
		//获取li标签集合中的值要用li[index]指定下标
			//获取标签的文本内容通过innerHTML获取
			//	alert(li[1].text);//有反应 获取不到
			//	alert(li[1].text());//没反应 获取不到
			//	alert(li[0].value);//有反应 获取到
			//	alert(li[0].value);//有反应 获取到
			alert(ul);
		});
</script>
</html>
