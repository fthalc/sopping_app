@extends('back.layouts.master')
@section('title',$product->name.' ürününü güncelle')
@section('content')
    <div class="container-fluid">
        @include('back.widgets.header')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('admin.urunler.update',$product->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label style="font-weight: bold">Ürün Adı</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ürün Fiyatı</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}" required>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ürün Kategori</label>
                        <select class="form-control" name="category" required>
                            <option value="">Kategori Seçiniz</option>
                            @foreach($categories as $category)
                                <option @if($product->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ürün Fotoğrafı</label><br>
                        <img src="{{asset($product->image)}}" class="img-thumbnail rounded" width="150px">
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ürün Açıklaması</label>
                        <textarea name="description" class="form-control" rows="4">{!! $product->description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ürün Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height':200
                }
            );
        });
    </script>
@endsection

