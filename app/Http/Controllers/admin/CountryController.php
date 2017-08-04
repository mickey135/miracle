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

    /**
     * [countryEdit 地区修改]
     * @param  Request $req        [description]
     * @param  [type]  $country_id [description]
     * @return [type]              [description]
     */
    public function countryEdit(Request $req,$country_id){
        $country = new Country();
        $data = $country->find($country_id);
        if(empty($_POST)){
            return view('admin/countryedit',['country'=>$data]);
        }else{
            if($req->title == ""){
                return '栏目不能为空';
            }elseif($country::where('country',$req->title)->first()){
                return back()->with('msg','栏目名已存在');
            }else{
                $data->country = $req->title;
                $data->save();
                return  redirect('admin/country');
            }   
            
        }
    }

    /**
     * [countryDel 地区删除]
     * @param  [type] $country_id [description]
     * @return [type]             [description]
     */
    public function countryDel($country_id){
        $num = Country::where('country_id',$country_id)->first(['num']);
        if($num == 0){
            Country::where('country_id',$country_id)->delete();
            return back();       
        }else{
            return '该地区下面存在电影,不能删除';
        }
    }




}
