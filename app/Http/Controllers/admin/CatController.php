<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cat;
class CatController extends Controller
{	
	/**
	 * [catList 栏目列表&栏目添加]
	 * @return [type] [description]
	 */
    public function cat(Request $req){
    	$cat = new Cat();
    	if(empty($_POST)){
    		$data = $cat->all(); 
    		return view('admin/cat',['cat'=>$data]);	
    	}else{
    		if($req->title == ""){
    			return '栏目不能为空';
    		}elseif($cat::where('cat_name',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
	    		$cat->cat_name = $req->title;
	    		$cat->save();
	    		return back();		
    		}		
    	}
    }
    /**
     * [catedit 栏目修改]
     * @return [type] [description]
     */
    public function catEdit(Request $req,$cat_id){
    	$cat = new Cat();
    	$data = $cat->find($cat_id);
    	if(empty($_POST)){
    		return view('admin/catedit',['cat'=>$data]);
    	}else{
    		if($req->title == ""){
    			return '栏目不能为空';
    		}elseif($cat::where('cat_name',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
	    		$cat->cat_name = $req->title;
	    		$cat->save();
	    		return  redirect('admin/cat');
    		}	
    		
    	}
    }
    /**
     * [catDel 栏目删除]
     * @return [type] [description]
     */
    public function catDel($cat_id){
    	Cat::where('cat_id',$cat_id)->delete();
    	return back();
    }
}
