<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Relation;
use App\Relation2;
use App\Actor;
use App\Type;
use DB;
class IndexController extends Controller
{
	/**
	 * [latest 最近更新的电影]
	 * @return [type] [description]
	 */
    public function latest(){
	 //    $types = [];
		// $movietypes = Relation::where('movie_id',$id)->get(['type_id']);
		// foreach($movietypes as $v){
		// 	$types[] = $v->type_id;
		// }
		$movie = Movie::orderby('movie_id','desc')->take(100)->get();
    	return view('index',['movie'=>$movie]);
    }

    /**
     * [hot 热门电影]
     * @return [type] [description]
     */
    public function hot(){
    	$movie = Movie::where('is_hot',1)->orderby('movie_id','desc')->take(80)->get();
    	return view('hot',['movie'=>$movie]);
    }

    /**
     * [gn 国内电影]
     * @return [type] [description]
     */
    public function gn(){

    }

    /**
     * [rh 日韩影片]
     * @return [type] [description]
     */
    public function rh(){

    }

    /**
     * [om 欧美影片]
     * @return [type] [description]
     */
    public function om(){

    }

    /**
     * [dh 动画电影]
     * @return [type] [description]
     */
    public function dh(){

    }

    /**
     * [movie 电影信息]
     * @return [type] [description]
     */
    public function movie($id){
       $movie = Movie::where('movie_id',$id)->first();
       //演员
       $actors_id = Relation2::where('movie_id',$movie->movie_id)->get();
       $actor = [];
       foreach($actors_id as $v){
            $a = Actor::where('actor_id',$v->actor_id)->first(['actor']);
            $actor[] = $a;
       }
       //类型
       $types_id = Relation::where('movie_id',$movie->movie_id)->get();
       $type = [];
       foreach($types_id as $v){
            $a = Type::where('type_id',$v->type_id)->first(['type']);
            $type[] = $a;
       }
       //地区
       $country = DB::table('countrys')->where('country_id',$movie->country)->first(); 
       // dd($country);
       return view('detail',['movie'=>$movie,'actor'=>$actor,'type'=>$type,'country'=>$country]);

    }
}
