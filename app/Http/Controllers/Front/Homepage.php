<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homepage extends Controller
{
    public function index(){
        $data['slides']=DB::table('slides')->get();
        return view('front.homepage',$data);
    }
    public function query(Request $request){
        $data['post']=DB::table('posts')->where('code',$request->code)->first() ?? abort(403 ,"Böyle bir gönderi bulunmamaktadır.");
        return view('front.post-detail',$data);
    }
}
