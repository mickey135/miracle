<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@section('head')
	<title>最新100部电影</title>
	@show
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/detail.css">
	<!-- 百度访问分析代码 -->
    <script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?1c7da3556914e20fbc1c5d06826d7551";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
	<!-- 消息弹窗代码 -->
	<style type="text/css">
		#winpop { width:200px; height:0px; position:fixed; right:0; bottom:0; border:1px solid #999999; margin:0; padding:1px; overflow:hidden; display:none; background:#FFFFFF}
		#winpop #tanchuang_title { width:100%; height:20px; line-height:20px; background:#FFCC00; font-weight:bold; text-align:center; font-size:12px;}
		#winpop #tanchuang_msg { width:100%; height:80px; line-height:80px; font-weight:bold; font-size:12px; color:#FF0000; text-decoration:underline; text-align:center}
		#tanchuang_close { position:absolute; right:4px; top:-1px; color:#FFFFFF; cursor:pointer}
	</style>
</head>
<body>
	<!-- 左边栏 -->
	<div class="left">
		<!-- 头部 -->
		<header id="header" class="">
			<!-- logo图片 -->
			<div class="logo"></div>			
		</header>

		<!-- 导航栏 -->
		<nav>
			<ul class="list_top">
				<li class="l_t">电影频道</li>
				<li><a href="/">首页</a></li>
				<li><a href="{{url('hot')}}">新片精品</a></li>
				<li><a href="{{url('gn')}}">国内电影</a></li>
				<li><a href="{{url('rh')}}">日韩影片</a></li>
				<li><a href="{{url('om')}}">欧美影片</a></li>
		        <li><a href="{{url('dh')}}">动画电影</a></li>
		        <li><a href="#">分类列表</a></li>
		        <li style="display:none;"><a href="#"></a></li>
		    </ul>
		</nav>

		<hr>
		<!-- 搜索栏 -->
		<div class="search">
	        <form action="{{url('search')}}" method="get">
	 		 		<input type="text" name="keyword" required="required">
	            	<input type="submit" value="" class="button">
			</form>
	    </div>
		<hr>
		<!-- 底部 -->
		<ul class="list_bottom">
			<li><a href="#">关于</a></li>
			<li><a href="#">友情链接</a></li>
			<li>Copyright © 2017 gopikachu.cn</li>
	    </ul>
		
	</div>
@section('right')

@show
<!-- 消息弹窗 -->
<div id="winpop">
	<div id="tanchuang_title">系统消息<span id="tanchuang_close" onclick="tips_pop()">X</span></div>
	<div id="tanchuang_msg"></div>
</div>
</body>
<script type="text/javascript">
	var tanchuang_msg = document.getElementById('tanchuang_msg');		
	var ws = new WebSocket('ws://47.94.147.221:9501');
	ws.onopen = function(){

	}
	ws.onmessage = function(ev){
		tanchuang_msg.innerHTML += ev.data;
		tips_pop();
	}
	function tips_pop(){
	  var MsgPop=document.getElementById("winpop");//获取窗口这个对象,即ID为winpop的对象
	  var popH=parseInt(MsgPop.style.height);//用parseInt将对象的高度转化为数字,以方便下面比较
	   if (popH==0){         //如果窗口的高度是0
	   MsgPop.style.display="block";//那么将隐藏的窗口显示出来
	  show=setInterval("changeH('up')",2);//开始以每0.002秒调用函数changeH("up"),即每0.002秒向上移动一次
	   }
	  else {         //否则
	   hide=setInterval("changeH('down')",2);//开始以每0.002秒调用函数changeH("down"),即每0.002秒向下移动一次
	  }
	}
	function changeH(str) {
		 var MsgPop=document.getElementById("winpop");
		 var popH=parseInt(MsgPop.style.height);
		 if(str=="up"){     //如果这个参数是UP
		  if (popH<=100){    //如果转化为数值的高度小于等于100
		  MsgPop.style.height=(popH+4).toString()+"px";//高度增加4个象素
		  }
		  else{  
		  clearInterval(show);//否则就取消这个函数调用,意思就是如果高度超过100象度了,就不再增长了
		  }
		 }
		 if(str=="down"){ 
		  if (popH>=4){       //如果这个参数是down
		  MsgPop.style.height=(popH-4).toString()+"px";//那么窗口的高度减少4个象素
		  }
		  else{        //否则
		  clearInterval(hide);    //否则就取消这个函数调用,意思就是如果高度小于4个象度的时候,就不再减了
		  MsgPop.style.display="none";  //因为窗口有边框,所以还是可以看见1~2象素没缩进去,这时候就把DIV隐藏掉
		  }
		 }
	}
	window.onload=function(){    //加载
	document.getElementById('winpop').style.height='0px';//我不知道为什么要初始化这个高度,CSS里不是已经初始化了吗,知道的告诉我一下
	// setTimeout("tips_pop()",800);     //3秒后调用tips_pop()这个函数
	}
</script>
</html>