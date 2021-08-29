<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('back.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'min:3',
           'image'=>'required|image|mimes:jpeg,png,jpg|max:10000'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->slug = Str::slug($request->name);

        //Resim upload işlemi önce gelip gelmediğini kontrol ediyoruz
        if($request->hasFile('image')){
            //geldiyse devamke
            $imageName = Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $product->image = '/uploads/'.$imageName;
        }
        $product->save();
        toastr()->success('Başarılı', 'Ürün başarıyla eklendi.');
        return redirect()->route('admin.urunler.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('back.products.update',compact('categories','product'));
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
        $request->validate([
            'name'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:10000'
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->slug = Str::slug($request->name);

        //Resim upload işlemi önce gelip gelmediğini kontrol ediyoruz
        if($request->hasFile('image')){
            //geldiyse devamke
            $imageName = Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $product->image = '/uploads/'.$imageName;
        }
        $product->save();
        toastr()->success('Başarılı', 'Ürün başarıyla güncellendi.');
        return redirect()->route('admin.urunler.index');
    }




    public function switch(Request  $request){
        $product = Product::findOrFail($request->id);
        $product->status = $request->statu ? 1:0;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */

    public function recover($id){
        Product::onlyTrashed()->find($id)->restore();
        toastr()->success('Başarılı', 'Ürün başarıyla geri yüklendi.');
        return redirect()->back();
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $product->delete();
        toastr()->success('Başarılı', 'Ürün başarıyla silindi.');
        return redirect()->route('admin.urunler.index');
    }
    public function trashed(){
        $products = Product::onlyTrashed()->orderBy('deleted_at','DESC')->get();
        return view('back.products.trashed',compact('products'));
    }
    public function hardDelete($id){
        $product = Product::onlyTrashed()->find($id);
        if(File::exists(public_path('uploads',$product->image))){
            unlink(public_path($product->image));
        }
        $product->forceDelete();
        toastr()->success('Başarılı', 'Ürün başarıyla silindi.');
        return redirect()->back();
    }

}
