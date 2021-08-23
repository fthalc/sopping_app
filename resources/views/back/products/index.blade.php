@extends('back.layouts.master')
@section('title','Tüm Ürünler')
@section('content')
    <div class="container-fluid">
        @include('back.widgets.header')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                <h6 class="m-0 font-weight-bold float-right text-primary"><strong>{{$products->count()}}</strong> Ürün Bulundu </h6>
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
                            <th>Durum</th>
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
                            <td>{!!$product->status ==0 ? "<span class='text-danger'> Pasif </span>" : "<span class='text-success'> Aktif </span>" !!}</td>
                            <td>
                                <a  href="#" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="#" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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

