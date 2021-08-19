@extends('front.layouts.master')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-3">
                    <div class="row">@include('front.widgets.category')</div>
                </div>
                <div class="col-md-5"><img class="card-img-top mb-5 mb-md-0" src="{{$product->image}}" alt="..." /></div>
                <div class="col-md-4">
                    <div class="small mb-1"></div>
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span style="font-weight: bolder">Ürünün Fiyatı : {{$product->price}} ₺</span>
                    </div>
                    <p class="lead">{{$product->description}}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                    <div class="float-end">Bu ürünü {{$product->hit}} kişi görüntülendi</div>
                </div>

            </div>
        </div>
    </section>
    @include('front.widgets.relatedProduct')

@endsection

