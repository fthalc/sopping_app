@extends('front.layouts.master')
@section('content')

    <div class="row">
        <div class="row-cols-sm-10">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success">
                            <strong>Success!</strong> This alert box could indicate a successful or positive action.
                        </div>
                        <div class="col-7 row-cols-md-1">
                              <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-shopping-cart">
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
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td>
                                                    <input disabled type="number" name="urun_adet" required max="10" value="{{$sepet->urun_adet}}">
                                                </td>
                                                <td>
                                                    <div class="price-wrap">
                                                        <var class="price">{{$sepet->getProduct->price}} ₺</var>
                                                    </div>
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
                        <br>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <dl class="dlist-align">
                                        <dt>Total price: {{$total}} ₺ </dt>
                                        <dd class="text-right ml-3"></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
