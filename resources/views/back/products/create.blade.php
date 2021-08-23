@extends('back.layouts.master')
@section('title','Ürün Ekle')
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
                <form method="post" action="{{route('admin.urunler.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Ürün Adı</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ürün Fiyatı</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ürün Kategori</label>
                        <select class="form-control" name="category" required>
                            <option value="">Kategori Seçiniz</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ürün Fotoğrafı</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ürün Açıklaması</label>
                        <textarea name="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ürün Ekle</button>
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

