@extends('layout')

@section('head')
	<title>{{$movie->title}}</title>
@endsection

@section('right')
    <div class="detail">
			<div class="zw"></div>
			<div class="d_img">
				<img src="">
			</div>
			<h2 class="d_title">{{$movie->title}}</h2>
			<table class="tb">
				<tbody>
					<tr class="d_bianse">
						<td class="fis_td">电影名</td>
						<td>{{$movie->movie_name}}</td>
					</tr>		
					<tr class="d_bianse">
						<td class="fis_td">导演</td>
						<td>{{$movie->director}}</td>
					</tr>
					<tr>
						<td class="fis_td">主演</td>
						<td>
							@foreach($actor as $v)
							<a href="url('search/actor',['actor_id'=>$v->actor_id])">{{$v->actor}}</a>
							@endforeach
						</td>
					</tr>
					<tr class="d_bianse">
						<td class="fis_td">类型</td>
						<td>
							@foreach($type as $v)
							<a href="url('search/type',['type_id'=>$v->type_id])">{{$v->type}}</a>
							@endforeach
						</td>
					</tr>
					<tr>
						<td class="fis_td">年代</td>
						<td>{{$movie->time}}</td>
					</tr>
					<tr class="d_bianse">
						<td class="fis_td">地区</td>
						<td>{{$country->country}}</td>
					</tr>
					<tr>
						<td class="fis_td">别名</td>
						<td>{{$movie->another_name}}</td>
					</tr>
				</tbody>
			</table>
			<a href="#xiazai"><div class="video">下载地址</div></a>
			<div class="line"></div>
			<div class="summary">
				<h3>剧情简介</h3>
				<div class="sum">{!!$movie->intro!!}</div>
			</div>
            <div style="margin-top:10px;height:0px;width:940px;text-align:center;"></div>
    </div>
@endsection