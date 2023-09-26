<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["allproduct"]=Product::all();
        return view("User.product.viewallproduct",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new Product();
        $this->data["allcategory"]=Category::all();
        return view("User.addproduct.newproduct",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data=new Product();
        $data->category_id=$request->category_name;
        $data->title=$request->name;
        $data->description=$request->description;
        $data->cost_prize=$request->cost_prize;
        $data->prize=$request->prize;
        $data->save();
        Session()->flash("message","Product create successfully");
        return redirect()->to("/products");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       $this->data["singleproductshow"]=$product;
       return view("User.singproductview.singleproduct",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $this->data["allcategory"]=Category::all();
        $this->data["editdata"]=$product;
        return view("User.addproduct.newproduct",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $updatedata=$request;
        $product->category_id=$updatedata["category_name"];
        $product->title=$updatedata["name"];
        $product->description=$updatedata["description"];
        $product->cost_prize=$updatedata["cost_prize"];
        $product->prize=$updatedata["prize"];
        $product->save();
        Session()->flash("message","product update successfully");
        return redirect()->to("/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       Session()->flash("message","porduct delete successfully");
       return redirect()->to("/products");
    }
}
