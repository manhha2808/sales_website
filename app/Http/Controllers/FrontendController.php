<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use function JmesPath\search;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['featured'] = Product::where('featured',1)->orderBy('product_id','desc')->take(8)->get();
        $data['updated_at'] = Product::orderBy('product_id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('comment_product', $id)->get();
        return view('frontend.details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('category',$id)->orderBy('product_id','desc')->paginate(8);
        return view('frontend.category', $data);
    }

    public function postComment(Request $request, $id){
        $comment = new Comment;
        $comment->comment_name = $request->name;
        $comment->comment_email = $request->email;
        $comment->comment_content = $request->content;
        $comment->comment_product = $id;
        $comment->save();
        return back();
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Product::where('name','like', '%'.$result.'%')->get();
        return view('frontend.search', $data);
    }
}
