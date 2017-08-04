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

    /**
     * [typeedit 类型修改]
     * @return [type] [description]
     */
    public function typeEdit(Request $req,$type_id){
        $type = new Type();
        $data = $type->find($type_id);
        if(empty($_POST)){
            return view('admin/typeedit',['type'=>$data]);
        }else{
            if($req->title == ""){
                return '栏目不能为空';
            }elseif($type::where('type',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
                $data->type = $req->title;
                $data->save();
                return  redirect('admin/type');
            }   
            
        }
    }
    /**
     * [typeDel 类型删除]
     * @return [type] [description]
     */
    public function typeDel($type_id){
        $type = Type::where('type_id',$type_id)->first(['num']);
        $num = $type->num;
        if($num == 0){
            Type::where('type_id',$type_id)->delete();
            return back();
        }else{
            return '该类型下存在电影,不能删除';
        }
        
    }


}
