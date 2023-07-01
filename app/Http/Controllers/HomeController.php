<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public static function countreview($id)
    {
        return Review::where('product_id', $id)->count();
    }
    public static function avrgreview($id)
    {
        return Review::where('product_id', $id)->average('rate');
    }
    public static function getsetting()
    {
        return Setting::first();
    }
    public function index(){

        $slider=Product::select('id','title','image','slug','price','category_id')->get();
        $erdem=Product::select('id','title','image','slug','price')->limit(4)->inRandomOrder()->get();
        $last=Product::select('id','title','image','slug','price')->limit(4)->orderByDesc('id')->get();
        $picked=Product::select('id','title','image','slug','price')->limit(4)->inRandomOrder()->get();
        $shopcart=Shopcart::select('id','product_id')->get();
        $data=[

            'erdem'=>$erdem,
            'last'=>$last,
            'picked'=>$picked,
            'slider'=>$slider,
            'shopcart'=>$shopcart,
            'page'=>'home'

        ];
        return view('home.index',$data);
    }



    public function categoryproducts($id,$slug){
        $datalist=Product::where('category_id',$id)->get();
        $data=Category::find($id);
        $shopcart=Shopcart::select('id','product_id')->get();
        return view('home.category_products',['data'=>$data,'datalist'=>$datalist,'shopcart'=>$shopcart]);

    }

    public function product($id,$slug){

        $setting=Setting::first();
        $data=Product::find($id);
        $images=Image::where('product_id',$id)->get();
        $reviews=Review::where('product_id',$id)->get();
        $shopcart=Shopcart::select('id','product_id')->get();

        return view('home.product_detail',['setting'=>$setting,'data'=>$data,'images'=>$images,'reviews'=>$reviews,'shopcart'=>$shopcart]);

    }

    public function sendreview(Request $request,$id)
    {
        $data = new Review;

        $data->user_id = Auth::id();
        $product = Product::find($id);
        $data->product_id=$id;
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->rate = $request->input('rate');



        $data->save();

        return redirect()->route('product',['id'=>$product->id,'slug'=>$product->slug])->with('success','Mesajınız kaydedilmiştir');
    }

    public function aboutus(){
        $setting=Setting::first();
        $shopcart=Shopcart::select('id','product_id')->get();
        return view('home.about',['setting'=>$setting,'shopcart'=>$shopcart]);
    }
    public function contact(){
        $setting=Setting::first();
        $shopcart=Shopcart::select('id','product_id')->get();
        return view('home.contact',['setting'=>$setting,'page'=>'home','shopcart'=>$shopcart]);
    }

    public function login(){
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
            return view('admin.login');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function sendmessage(Request $request)
    {
        $data = new Message();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');


        $data->save();

        return redirect()->route('contact')->with('success','Mesajınız kaydedilmiştir');
    }
}
