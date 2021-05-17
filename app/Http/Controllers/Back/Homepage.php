<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Searchable\Search;
use Illuminate\View\View;

class Homepage extends Controller
{
    public function index(){
        $data['posts']=DB::table('posts')->get();
        $data['incoming']=DB::table('posts')->where('state',1)->count();
        $data['received']=DB::table('posts')->where('state',2)->count();
        $data['delivery']=DB::table('posts')->where('state',3)->count();
        $data['delivered']=DB::table('posts')->where('state',4)->count();
        return view('back.homepage',$data);
    }
    public function login(){
        return view('back.login');
    }
    public function loginControl(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ], $request->remember)) {
            toastr()->success(Auth::user()->name .' '. Auth::user()->lastname, 'HOŞGELDİNİZ');
            return redirect()->route('cms');
        }
        return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı');
    }
    public function register(Request $request)
    {
        if ($request->file("image")){
            $image=$request->file("image");
            $user_image=uniqid().$image->getClientOriginalName();
            $image->move("back/img/users",$user_image);
        }
        else{
            $user_image="avatar.png";
        }
        Users::insert([
            'name' => $request->name,
            'lastname'=>$request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image'=>$user_image,
            'state'=>$request->state,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        toastr()->success('Kayıt işlemi Başarı');
        return back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('cms');
    }
    public function addPosts(){
        $data['customers']=DB::table('customers')->get();
        $data['users']=DB::table('users')->where('state','>',1)->get();
        return view('back.add-posts',$data);
    }
    public function addPostController(Request $request){
        $posts_codes=DB::table('posts')->pluck('code');
        $code=rand(10000000,99999999);
        while(true){
            foreach($posts_codes as $posts_code){
                if ($posts_code==$code){
                    $code=rand(10000000,99999999);
                    break;
                }
            }
            break;
        }
        Posts::insert([
            'code'=>$code,
            'type' => $request->type,
            'sender'=>$request->sender,
            'posted_address'=>Customers::find($request->sender)->address,
            'receiver'=>$request->receiver,
            'receiver_address'=>Customers::find($request->receiver)->address,
            'note'=>$request->note,
            'payment'=>$request->payment,
            'total'=>$request->total,
            'importance'=>$request->importance,
            'user_id'=>$request->courier,
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        toastr()->success('Yeni gönderi başarılı bir şekilde oluşturuldu');
        return redirect()->route('cms');
    }
    public function addCustomerController(Request $request){
        Customers::insert([
            'username' => $request->username,
            'identification'=>$request->identification,
            'tel'=>$request->tel,
            'address'=>$request->address,
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        toastr()->success('Yeni müşteri başarılı bir şekilde kaydedildi');
        return back();
    }
    public function incomingPosts(){
        $data['posts']=DB::table('posts')->where('state',1)->get();
        return view('back.incoming-posts',$data);
    }
    public function received($id){
        $post=Posts::find($id);
        $post->state=2;
        $post->updated_at=now();
        $post->save();
        return back();
    }
    public function receivedPosts(){
       $data['posts']=DB::table('posts')->where('state',2)->get();
        return view('back.received-posts',$data);
    }
    public function delivery($id){
        $post=Posts::find($id);
        $post->state=3;
        $post->updated_at=now();
        $post->save();
        return back();
    }
    public function deliveryPosts(){
        $data['posts']=DB::table('posts')->where('state',3)->get();
        return view('back.delivery-posts',$data);
    }
    public function delivered(Request $request){
        $post=Posts::find($request->id);
        $post->state=4;
        $post->delivered=$request->delivered;
        $post->signature=$request->signature;
        $post->updated_at=now();
        $post->save();
        return back();
    }
    public function deliveredPosts(){
        $data['posts']=DB::table('posts')->where('state',4)->get();
        return view('back.delivered-posts',$data);
    }
    public function print($id){
        $data['post']=DB::table('posts')->where('id',$id)->first();
        return view('back.print',$data);
    }
    public function customers(){
        $data['customers']=DB::table('customers')->get();
        return view('back.customers',$data);
    }
    public function posts(){
        $data['posts']=DB::table('posts')->get();
        return view('back.posts',$data);
    }
    public function users(){
        $data['users']=DB::table('users')->get();
        return view('back.users',$data);
    }
    public function slides(){
        $data['slides']=DB::table('slides')->get();
        return view('back.slides',$data);
    }

}
