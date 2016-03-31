//当html页面加载完成后再执行	
window.onload=function (){
		document.getElementById('face_img').onclick=function()
		{
			//当点击头像图标时弹出新窗口
			window.open('face.php','face','width=500,height=350,top=0,left=0');
			}
	}




//通过opener可以获取父窗口的id	或者 标签[ tag  ]			
		var face_img = opener.document.getElementById('face_img');
		//获取页面里所有的img标签
		var imgs = document.getElementsByTagName('img');
		//当点击了某个图片时，父窗口即时更改图片状态
		for(var i=0;i<imgs.length;i++)
		{
			imgs[i].onclick = function()
			{	//选择的同时把图片相对地址填到隐藏标签上
				opener.document.register.img_tag.value = this.alt;
				face_img.src = this.src;
			}
		}
