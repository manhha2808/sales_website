<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['productlist'] = DB::table('products')->join('category', 'products.category', '=', 'category.cate_id')->orderBy('product_id', 'desc')->get();
        return view('backend.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product;

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->cpu = $request->cpu;
        $product->ram = $request->ram;
        $product->storage = $request->storage;
        $product->display = $request->display;
        $product->vga = $request->vga;
        $product->battery = $request->battery;
        $product->weight = $request->weight;
        $product->material = $request->material;
        $product->kind = $request->kind;
        $product->condition = $request->condition;
        $product->price = $request->price;
        $product->promotion = $request->promotion;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->warranty = $request->warranty;
        $product->description = $request->description;
        $product->img = $filename;
        $product->category = $request->category;

        $product->save();
        $request->img->storeAs('./public/img', $filename);

        return redirect()->intended('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
        return view('backend.editproduct', $data);
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
        $product = new Product;

        $productData['name'] = $request->name;
        $productData['slug'] = str_slug($request->name);
        $productData['cpu'] = $request->cpu;
        $productData['ram'] = $request->ram;
        $productData['storage'] = $request->storage;
        $productData['display'] = $request->display;
        $productData['vga'] = $request->vga;
        $productData['battery'] = $request->battery;
        $productData['weight'] = $request->weight;
        $productData['material'] = $request->material;
        $productData['kind'] = $request->kind;
        $productData['condition'] = $request->condition;
        $productData['price'] = $request->price;
        $productData['promotion'] = $request->promotion;
        $productData['status'] = $request->status;
        $productData['featured'] = $request->featured;
        $productData['warranty'] = $request->warranty;
        $productData['description'] = $request->description;
        $productData['category'] = $request->category;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $productData['img'] = $img;
            $request->img->storeAs('./public/img', $img);
        }

        $product::where('product_id', $id)->update($productData);

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }
}
