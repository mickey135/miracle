<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Type;
use App\Country;
use App\Actor;
use App\Movie;
use App\Relation2;
use App\Relation;
use DB;
class MovieController extends Controller
{	
	/**
	 * [add 电影添加]
	 * @param Request $req [description]
	 */
    public function add(Request $req){
    	if(empty($_POST)){
    		$type = Type::all();
    		$country = Country::all();
    		return view('admin.add',['type'=>$type,'country'=>$country]);
    	}else{
			//向movies表添加数据
			$movie = new Movie();
			$movie->movie_name = $req->title;
			$movie->image = $req->img;
			$movie->director = $req->director;
			$movie->time = $req->time;
			$movie->country = $req->country; 
			$movie->another_name = $req->another_name;
			$movie->intro = $req->intro;
			$movie->is_hot = $req->is_hot;
			$movie->save();
			$id = $movie->movie_id;

			//向类型表添加数量加一
			//向类型关系表添加数据
			if($req->type){
				foreach($req->type as $v){
					DB::table('types')->where('type_id',$v)->increment('num');
					DB::table('relations')->insert(['movie_id'=>$id,'type_id'=>$v]);
				}
			}

			//向演员表添加数量加一
			//向演员关系表添加数据				
			if($req->actor){
				$actors = explode('|',$req->actor);
				foreach($actors as $v){
					if($actor = DB::table('actors')->where('actor',$v)->first()){
						DB::table('actors')->where('actor_id',$actor->actor_id)->increment('num');
						DB::table('relation2s')->insert(['movie_id'=>$id,'actor_id'=>$actor->actor_id]);
					}else{
						$actor_id = DB::table('actors')->insertGetId(['actor'=>$v,'num'=>1]);
						DB::table('relation2s')->insert(['movie_id'=>$id,'actor_id'=>$actor_id]);
					}
				}
			}				

	   
	    }

    }


    /**
     * [list 电影列表]
     * @return [type] [description]
     */
    public function list(){
    	$movie = Movie::paginate(5);
    	return view('admin.list',['movie'=>$movie]);
    	// return view('admin.list');

    }

    /**
     * [edit 电影信息修改]
     * @return [type] [description]
     */
    public function edit($id,Request $req){
    	if(empty($_POST)){
    		$movie = Movie::find($id);
    		$country = Country::all();
    		$type = Type::all();
    		//获取演员名字
    		$actors = Relation2::where('movie_id',$id)->get(['actor_id']);
    		$actor = '';
    		foreach($actors as $v){
    			$a = Actor::where('actor_id',$v->actor_id)->first(['actor']);
    			$actor .= $a->actor.'|';
    		}
    		$actor = rtrim($actor,'|');
    		//获取电影类型
    		$types = [];
    		$movietypes = Relation::where('movie_id',$id)->get(['type_id']);
    		foreach($movietypes as $v){
    			$types[] = $v->type_id;
    		}
    		// dd($type);
    		return view('admin.edit',['movie'=>$movie,'country'=>$country,'type'=>$type,'actor'=>$actor,'types'=>$types]);
    	}else{
   //  		$movie = Movie::find($id);
   //  		$movie->movie_name = $req->title;
			// $movie->image = $req->img;
			// $movie->director = $req->director;
			// $movie->time = $req->time;
			// $movie->country = $req->country; 
			// $movie->another_name = $req->another_name;
			// $movie->intro = $req->intro;
			// $movie->is_hot = $req->is_hot;
			// $movie->save();
    	}	
    }

    /**
     * [del 电影删除]
     * @return [type] [description]
     */
	public function del($id){

	}

}
