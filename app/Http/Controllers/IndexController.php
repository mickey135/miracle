<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
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
     * [movie 电影信息]
     * @return [type] [description]
     */
    public function movie($id){
    //    $movie = Movie::where('movie_id',$id)->first();
	   // return view('film',['movie'=>$movie]);
       // $movie = Movie::where('is_hot',1)->orderby('movie_id','desc')->take(80)->get();
       // return view('film',['movie'=>$movie]);
       return view('detail');

    }
}
