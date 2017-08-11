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
	 		 		<input type="text" name="keyword">
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
</body>
</html>