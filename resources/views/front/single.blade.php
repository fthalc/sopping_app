@extends('front.layouts.master')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-7"><img class="card-img-top mb-5 mb-md-0" src="{{$product->image}}" alt="..." /></div>
                <div class="col-md-5">
                    <div class="small mb-1"></div>
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span style="font-weight: bolder">Ürünün Fiyatı : {{$product->price}} ₺</span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span style="font-weight: bolder">Kategori : <a style="text-decoration: none"  href="{{route('category',$product->getCategory->slug)}}">{{$product->getCategory->name}}</a></span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span style="font-weight: bolder">Ürün Açıklaması</span>
                        <p class="lead">{{$product->description}}</p>
                    </div>

                    <form action="{{route('sepet.create',$product->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="urun_id" value="{{$product->id}}">
                        <input type="number" name="urun_adet" value="1">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Sepete Ekle
                        </button>
                    </form>

                    <hr>
                    <div class="float-end">Bu ürünü {{$product->hit}} kişi görüntülendi</div>
                </div>

            </div>
        </div>
    </section>
    @include('front.widgets.relatedProduct')
    @include('front.layouts.footer')

@endsection

