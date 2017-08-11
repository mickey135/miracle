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
use sngrl\SphinxSearch\SphinxSearch;//sphinx搜索
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
		    $movie = Movie::orderby('movie_id','desc')->take(50)->get();
    	  return view('index',['movie'=>$movie]);
    }

    /**
     * [hot 热门电影]
     * @return [type] [description]
     */
    public function hot(){
        $title = '热门电影';
      	$movie = Movie::where('is_hot',1)->orderby('movie_id','desc')->take(50)->get();
      	return view('list',['movie'=>$movie,'title'=>$title]);
    }

    /**
     * [gn 国内电影]
     * @return [type] [description]
     */
    public function gn(){
        $title = '国内电影';
        $movie = Movie::whereIn('country',[2,3,4])->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]);
    }

    /**
     * [rh 日韩影片]
     * @return [type] [description]
     */
    public function rh(){
        $title = '日韩电影';
        $movie = Movie::whereIn('country',[5,6])->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]);
    }

    /**
     * [om 欧美影片]
     * @return [type] [description]
     */
    public function om(){
        $title = '欧美电影';
        $movie = Movie::where('country',7)->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]);
    }

    /**
     * [dh 动画电影]
     * @return [type] [description]
     */
    public function dh(){
        $title = '动画电影';
        $id = Relation::where('type_id',8)->get(['movie_id']);
        $data = [];
        foreach($id as $v){
          $data[] = $v->movie_id;
        }
        $movie = Movie::whereIn('movie_id',$data)->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]);      
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

    /**
     * [search 搜索]
     * @return [type] [description]
     */
    public function search(Request $req) {
        $title = $req->keyword.'的搜索结果';
        $sphinx = new SphinxSearch();
        $results = $sphinx->search($req->keyword, 'movies')->query();
        // print_r(array_keys($results['matches']));
        if(!$results['matches']){
            $movie = ;
            return view('list',['movie'=>$movie,'title'=>$title]);
            exit;
        }
        $res = array_keys($results['matches']);
        $movie = Movie::whereIn('movie_id',$res)->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]);

    }
}
