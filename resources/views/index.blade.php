@extends('layout')
@section('head')
	<title>最新100部电影</title>
@endsection
@section('right')
	<div class="right">
		@foreach($movie as $v)
		<div class="unit">
			<a href="{{url('detail',['id'=>$v->movie_id])}}"><img src="{{$v->image}}" width="220" height="300"></a>
			<a class="title" href="{{url('detail',['id'=>$v->movie_id])}}" target="_blank">{{$v->title}}</a>
		</div>
		@empty
			{{'搜索结果为空'}}			
		@endforeach
		<div class="totop" onclick="scrollTo(0,0);" style="position: fixed;bottom:100px;right:40px;background-image:url(&#39;/img/totop.gif&#39;);height:40px;width:40px;cursor:pointer;"></div>
	</div>
@endsection