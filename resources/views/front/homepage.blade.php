@extends('front.layouts.master')
@section('content')
<section class="py-4">
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <div class=" row container px-4 px-lg-5 mt-5">
        <div class="col-md-3">
            <div class="row">@include('front.widgets.category')</div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="row row-cols-3 row-cols-sm-3">
            @foreach($product as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{route('single',[$product->getCategory->slug,$product->slug])}}"><img class="card-img-top" src="{{$product->image}}" alt="..." /></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a class="text-decoration-none text-black" href="#"><h5 class="fw-bolder">{{$product->name}}</h5></a>
                            <h6 class="fw-lighter">{{Str::limit($product->description,30)}}</h6>
                            <h6 class="fw-lighter">{{$product->created_at->diffForHumans()}}</h6>
                            <!-- Product price-->
                            <div>
                                Fiyat : {{$product->price}} ₺
                            </div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
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
