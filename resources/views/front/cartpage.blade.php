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
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
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
                                            <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{$sepet->getProduct->name}}</a>
                                                <p class="small text-muted"> asfasfasf<br> Brand: Cantabil</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <input type="number" name="urun_adet" required max="10" value="{{$sepet->urun_adet}}">
                                        <a href="{{route('sepet.update',$sepet->getProduct->id)}}" class="btn btn-light btn-round" data-abc="true"> Remove</a>

                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">{{$sepet->getProduct->price}} ₺</var>
                                        </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a href="{{route('sepet.delete',$sepet->id)}}" class="btn btn-light btn-round" data-abc="true"> Remove</a>
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

                            <a href="#" class="btn btn-out btn-success btn-square btn-main" data-abc="true">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection
