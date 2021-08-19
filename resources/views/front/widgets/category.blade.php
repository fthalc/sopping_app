@isset($categories)
<div class="row-cols-lg-auto">
    <div class="card-title" style="font-weight: bolder;text-align: center">KATEGORİLER</div>
    <div class="list-group">
        @foreach($categories as $category)
            <a style="border-radius: 10px;margin-top: 5px;margin-bottom:5px" class=" shadow rounded list-group-item text-light  bg-dark @if(Request::segment(2)==$category->slug) shadow mb-1 p-2 bg-success rounded text-black bg-white @endif" @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}@endif ">{{$category->name}}
                <span style="width: 20px; text-align: center; font-weight: bolder;border-radius: 50px" class="text-black bg-white float-end"> {{$category->productCount()}} </span></a>
        @endforeach
    </div>
</div>
@endisset
