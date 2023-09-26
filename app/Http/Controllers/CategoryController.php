<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $this->data["allcategory"]=Category::all();
       return view("User.category.viewallcategory",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new Category();
        $this->data["allcategory"]=Category::all();
        return view("User.addcategory.newcategory",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data=new Category();
        $data->title=$request->name;
        $data->save();
        Session()->flash("message","Category create successfully");
        return redirect()->to("categorise");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $this->data["editdata"]=$category->find($id);
        return view("User.addcategory.newcategory",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category,$id)
    {
        $updatacategory=$category->find($id);
        $updatedata=$request;
        $updatacategory->title=$updatedata["name"];
        $updatacategory->save();
        Session()->flash("message","category updated successfully");
        return redirect()->to("/categorise");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $category->find($id)->delete();
        Session()->flash("message","Category deleted successfully");
        return redirect()->to("/categorise");
    }
}
