<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Type;
class TypeController extends Controller
{
	/**
	 * [type 类型列表及添加]
	 * @param  Request $req [description]
	 * @return [type]       [description]
	 */
    public function type(Request $req){
    	$type = new Type();
    	if(empty($_POST)){
    		$data = $type->all(); 
    		return view('admin/type',['type'=>$data]);	
    	}else{
    		if($req->title == ""){
    			return '栏目不能为空';
    		}elseif($type::where('type',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
	    		$type->type = $req->title;
	    		$type->save();
	    		return back();		
    		}		
    	}
    }
}
