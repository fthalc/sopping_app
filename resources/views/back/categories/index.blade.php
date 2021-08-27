@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
    <div class="container-fluid">
        @include('back.widgets.header')
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kategori Oluştur</h6>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kategori Adı</th>
                                    <th>Ürün Sayısı</th>
                                    <th>Durum</th>
                                    <th style="width: 100px;">işlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->price}} ₺</td>
                                        <td>{{$product->price}} ₺</td>
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
        </div>
    </div>
@endsection

