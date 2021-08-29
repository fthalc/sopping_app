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
                        <form method="post" action="{{route('admin.category.create')}}">
                            @csrf
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input type="text" class="form-control" name="category" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Ekle</button>
                            </div>
                        </form>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->productCount()}}</td>
                                        <td>
                                            <input class="switch" category-id="{{$category->id}}" data-on="Aktif" data-off="Pasif" @if($category->status == 1) checked @endif  type="checkbox"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td>
                                            <a category-id="{{$category->id}}" class="btn btn-sm btn-primary edit-click" title="Düzenle"><i class="fa fa-edit"></i></a>
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
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kategori Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post" action="{{route('admin.category.update')}}">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input id="category" type="text" class="form-control" name="category">
                        <input type="hidden" name="id" id="category_id">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-success" >kaydet</button>
                </div>
                </form>
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
            $('.edit-click').click(function (){
                id = $(this)[0].getAttribute('category-id');
                $.ajax({
                    type:'GET',
                    url:'{{route('admin.category.getdata')}}',
                    data:{id:id},
                    success:function (data){
                        console.log(data);
                        $('#category').val(data.name);
                        $('#category_id').val(data.id);
                        $('#editModal').modal();
                    }
                })
            });

            $('.switch').change(function() {
                id = $(this)[0].getAttribute('category-id');
                statu=$(this).prop('checked');
                $.get("{{route('admin.category.switch')}}",{id:id,statu:statu},function (data, status){
                    console.log(data);
                });
            })
        })
    </script>
@endsection
