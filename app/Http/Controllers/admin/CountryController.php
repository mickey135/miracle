<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
class CountryController extends Controller
{
	/**
	 * [country 地区列表及添加]
	 * @param  Request $req [description]
	 * @return [type]       [description]
	 */
    public function country(Request $req){
    	$country = new Country();
    	if(empty($_POST)){
    		$data = $country->all(); 
    		return view('admin/country',['country'=>$data]);	
    	}else{
    		if($req->title == ""){
    			return '栏目不能为空';
    		}elseif($country::where('country',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
	    		$country->country = $req->title;
	    		$country->save();
	    		return back();		
    		}		
    	}
    }
}
