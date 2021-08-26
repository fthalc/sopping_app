@extends('front.layouts.master')
@section('content')
<section class="py-4">
    @include('front.widgets.divider')
    <div class=" row container px-4 px-lg-5 mt-5">
        <div class="col-md-3">
            <div class="row">@include('front.widgets.category')</div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="row row-cols-3 row-cols-sm-3">
            @foreach($product as $product)
            <div class="col mb-5">
                <div class="card h-100" style="border-radius: 10px">
                    <!-- Product image-->
                    <a href="{{route('single',[$product->getCategory->slug,$product->slug])}}">
                        <img class="card-img-top" src="{{$product->image}}" alt="..." /></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a class="text-decoration-none text-black" href="#"><h5 class="fw-bolder">{{$product->name}}</h5></a>
                            <h5 style="font-weight: bold" class="fw-lighter"><a style="text-decoration: none" href="{{route('category',$product->getCategory->slug)}}">{{$product->getCategory->name}}</a></h5>
                            <h6 class="fw-lighter">{{Str::limit($product->description,30)}}</h6>
                            <!-- Product price-->
                            <div style="font-weight: bold">
                                Fiyat : {{$product->price}} ₺
                            </div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('single',[$product->getCategory->slug,$product->slug])}}">Ürüne Yakından Bak</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</section>

@include('front.layouts.footer')
@endsection
