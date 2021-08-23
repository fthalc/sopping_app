<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Sepet;
use Illuminate\Http\Request;

//Models
use App\Models\Category;
use App\Models\Product;

class Homepage extends Controller
{
    public function index(){
        $data['product']=Product::orderBy('created_at','DESC')->limit(10)->get();
        // $avize = Product::where('category_id',1)->orderBy('created_at','DESC')->limit(2)->get();
        $data['categories'] = Category::orderBy('name','ASC')->get();
        $data2['product2    ']=Product::orderBy('created_at','DESC')->limit(10)->get();
        return view('front.homepage',$data,$data2);
    }
    public function single($category,$slug){
        $category = Category::whereSlug($category)->first() ?? abort(404);
        $product=Product::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'Böyle bir ürün bulunamadı.');
        $product->increment('hit');
        $data['product'] = $product;
        $data['categories'] = Category::orderBy('name','ASC')->get();
        $category_id=$product->category_id;
        $related_products = Product::where('category_id',$category_id)->where('id','!=',$product->id)->get();
        return view('front.single',$data,compact('product','related_products'));
    }
    public  function category($slug){
        $category = Category::whereSlug($slug)->first() ?? abort(404);
        $data['category'] = $category;
        $data['product']=Product::where('category_id',$category->id)->orderBy('created_at','DESC')->get();
        $data['categories'] = Category::orderBy('name','ASC')->get();
        return view('front.category',$data);
    }
}
