<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Review::where('user_id',Auth::id())->get();
        $shopcart=Shopcart::select('id','product_id')->get();
        return view('home.user_reviews',['datalist'=>$datalist,'shopcart'=>$shopcart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Product::with('product_id')->get();
        return view('home.user_review_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $data = new Review();

        $data->user_id = Auth::id();
        $data = Product::find($id);
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->rate = $request->input('rate');
        $data->status = $request->input('status');


        $data->save();

        return redirect()->route('user_reviews')->with('success','Mesajınız kaydedilmiştir');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review,$id)
    {
        $data=Review::find($id);
        return view('home.user_review_edit',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review,$id)
    {
        $data=Review::find($id);
        $data->status=$request->input('status');
        $data->save();
        return back()->with('success','Review Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review,$id)
    {
        $data=Review::find($id);
        $data->delete();
        return redirect()->back()->with('success','Review Deleted!');

    }
}

