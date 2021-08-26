@extends('back.layouts.master')
@section('title','Silinen Ürünler')
@section('content')
    <div class="container-fluid">
        @include('back.widgets.header')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                <span class="m-0 font-weight-bold float-right text-primary"><strong>{{$products->count()}}</strong> Ürün Bulundu </span>
            </div>
            <div class="card-header py-1">
                <a href="{{route('admin.urunler.index')}}" class="btn btn-primary btn-sm float-right">Tüm Ürünler</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Ürün Fotoğrafı</th>
                            <th>Ürün Adı</th>
                            <th>Ürün Fiyatı</th>
                            <th>Kategori</th>
                            <th style="width: 250px;">Ürün Açıklaması</th>
                            <th>Hit</th>
                            <th>Oluşturulma Tarihi</th>
                            <th style="width: 100px;">işlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img src="{{$product->image}}" width="100">
                                </td>
                                <td width="100px">{{$product->name}}</td>
                                <td>{{$product->price}} ₺</td>
                                <td>{{$product->getCategory->name}}</td>
                                <td >{{$product->description}}</td>
                                <td>{{$product->hit}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.recover.product',$product->id)}}" title="Geri Yükle" class="btn btn-sm btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                            <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                        </svg>
                                    </a>
                                    <a href="{{route('admin.hard.delete.product',$product->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

