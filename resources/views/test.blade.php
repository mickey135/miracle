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
				<li><a href="#">国内电影</a></li>
				<li><a href="#">日韩影片</a></li>
				<li><a href="#">欧美影片</a></li>
		        <li><a href="#">动画电影</a></li>
		        <li><a href="#">分类列表</a></li>
		        <li style="display:none;"><a href="#" target="right">39文库</a></li>
		    </ul>
		</nav>

		<hr>
		<!-- 搜索栏 -->
		<div class="search">
	        <form action="#" method="get">
	 		 		<input type="text" name="keyword">
	            	<input type="button" value="" class="button">
			</form>
	    </div>
		<hr>
		<!-- 底部 -->
		<ul class="list_bottom">
			<li><a href="#">关于</a></li>
			<li><a href="#">友情链接</a></li>
			<li>Copyright © 2017 gopikachu</li>
	    </ul>
		
	</div>
@section('right')
	<div class="right">
		@foreach($movie as $v)
		<div class="unit">
			<a href="{{url('film',['id'=>$v->movie_id])}}"><img src="{{$v->image}}" width="220" height="300"></a>
			<a class="title" href="{{url('film',['id'=>$v->movie_id])}}" target="_blank">{{$v->title}}</a>
		</div>
		@endforeach


		<div class="totop" onclick="scrollTo(0,0);" style="position: fixed;bottom:100px;right:40px;background-image:url(&#39;/img/totop.gif&#39;);height:40px;width:40px;cursor:pointer;"></div>
	</div>
@show
</body>
</html>