<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sepet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use function Sodium\compare;

class SepetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sepets  = Sepet::all();
        $data = Product::all();
        return view('front.cartpage',compact('sepets','data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sepet = Sepet::where('urun_id',$request->urun_id)->first();
        if($sepet)
        {
            $sepet->urun_adet = $sepet->urun_adet+$request->urun_adet;
        }
        else{
            $sepet = new Sepet();
            $sepet->urun_id = $request->urun_id;
            $sepet->urun_adet = $request->urun_adet;
        }
        $sepet->save();
        return redirect('/sepet');
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
        return $id;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sepet = Sepet::find($request->id);
        $sepet->urun_adet +=$request->urun_adet;
        $sepet->update();
        return redirect('/sepet');
    }
    public function remove(Request $request)
    {
        $sepet = Sepet::find($request->id);
        if($sepet->urun_adet>1)
        {
            $sepet->urun_adet -=$request->urun_adet;
        }
        $sepet->update();
        return redirect('/sepet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        $sepet = Sepet::find($request->id);
        $sepet->delete();
        return redirect('/sepet');
    }
}
