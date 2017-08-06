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
class MovieController extends Controller
{
	/**
	 * [actor description]
	 * @param  [type] $actor [description]
	 * @return [type]        [description]
	 */
	public function actor($actor){
		$title = $actor.'电影';
		$a = Actor::where('actor',$actor)->first(['actor_id']);
		$actor_id = $a->actor_id;
        $id = Relation2::where('actor_id',$actor_id)->get(['movie_id']);
        $data = [];
        foreach($id as $v){
          $data[] = $v->movie_id;
        }
        $movie = Movie::whereIn('movie_id',$data)->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]); 
	}

	/**
	 * [type description]
	 * @param  [type] $type [description]
	 * @return [type]       [description]
	 */
	public function type($type){
		$title = $type.'电影';
		$a = Type::where('type',$type)->first(['type_id']);
		$type_id = $a->type_id;
        $id = Relation::where('type_id',$type_id)->get(['movie_id']);
        $data = [];
        foreach($id as $v){
          $data[] = $v->movie_id;
        }
        $movie = Movie::whereIn('movie_id',$data)->orderby('movie_id','desc')->paginate(50);
        return view('list',['movie'=>$movie,'title'=>$title]); 
	}
}
