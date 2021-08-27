@extends('front.layouts.master')
@section('content')
    <br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Ürün</th>
                                    <th scope="col" width="120">Adet</th>
                                    <th></th>
                                    <th></th>
                                    <th scope="col" width="120">Fiyat</th>
                                    <th scope="col" width="120"></th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                  $total = 0;
                                @endphp
                                @foreach($sepets as $sepet)
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img style="width: 100px;" src="{{$sepet->getProduct->image}}" class="img-sm"></div>
                                            <figcaption class="info">{{$sepet->getProduct->name}}
                                            </figcaption>
                                            <p class="small text-muted">{{$sepet->getProduct->getCategory->name}}</p>
                                        </figure>

                                    </td>
                                    <td>
                                        <input type="number" name="urun_adet" required max="10" value="{{$sepet->urun_adet}}">

                                    </td>
                                    <td>
                                        <form action="{{route('sepet.update',$sepet->id)}}" method="post">
                                            @csrf
                                            <input title="Arttır" type="hidden" name="urun_adet" value="1">
                                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('sepet.remove',$sepet->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="urun_adet" value="1">
                                            <button @if($sepet->urun_adet===1) disabled @endif title="Azalt" class="btn btn-outline-dark flex-shrink-0" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">{{$sepet->getProduct->price}} ₺</var>
                                        </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a title="Sil" href="{{route('sepet.delete',$sepet->id)}}" class="btn btn-light btn-round" data-abc="true">
                                            <i class="bi bi-cart-x-fill"></i> Kaldır
                                        </a>
                                    </td>
                                </tr>
                                    @php
                                    $total += $sepet->getProduct->price * $sepet->urun_adet;
                                    @endphp
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">

                                <dt>Total price: {{$total}} ₺ </dt>

                                <dd class="text-right ml-3"></dd>
                            </dl>
                            <hr>
                            @if($total===0)
                                <button disabled class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Alışverişi Tamamla</button>
                            @else
                                <a href="{{route('siparis')}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Alışverişi Tamamla</a>
                            @endif

                            <a href="{{route('homepage')}}" class="btn btn-out btn-success btn-square btn-main" data-abc="true">Alışverişe Devam Et</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    @include('front.layouts.footer')
@endsection

