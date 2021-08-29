<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name','ASC')->get();
        return view('back.categories.index')->with(['categories'=>$categories]);
    }
    public function create(Request $request){
        $isExist = Category::whereSlug(Str::slug($request->category))->first();
        if($isExist){
            toastr()->error($request->category.' adında bir kategori zaten mevcut.');
            return redirect()->back();
        }
        $category = new Category;
        $category->name = $request->category;
        $category->slug =Str::slug($request->category);
        $category->save();
        toastr()->success('Kategori Başarıyla oluşturuldu');
        return redirect()->back();
    }
    public function switch(Request  $request){
        $category = Category::findOrFail($request->id);
        $category->status = $request->status ? 1 : 0;
        $category->save();
    }

}
