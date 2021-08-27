@extends('back.layouts.master')
@section('title','Tüm Ürünler')
@section('content')
    <div class="container-fluid">
        @include('back.widgets.header')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                <span class="m-0 font-weight-bold float-right text-primary"><strong>{{$products->count()}}</strong> Ürün Bulundu </span>

            </div>
            <div class="card-header py-1">
                <a href="{{route('admin.trashed.product')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-trash"></i> Silinen Ürünler </a>
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
                            <td>
                                <input class="switch" product-id="{{$product->id}}" data-on="Aktif" data-off="Pasif" @if($product->status == 1) checked @endif  type="checkbox"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                            </td>
                            <td>
                                <a target="_blank" href="{{route('single',[$product->getCategory->slug,$product->slug])}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.urunler.edit',$product->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.delete.product',$product->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('product-id');
                statu=$(this).prop('checked');
                $.get("{{route('admin.switch')}}",{id:id,statu:statu},function (data, status){
                    console.log(data);
                });
            })
        })
    </script>
@endsection

