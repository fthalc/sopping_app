@extends('front.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
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
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img style="width: 100px;" src="{{asset('cart/')}}/image.png" class="img-sm"></div>
                                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">Printed White Tshirt</a>
                                            <p class="small text-muted">SIZE:M <br> Brand: Cantabil</p>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td> <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select> </td>
                                <td>
                                    <div class="price-wrap"> <var class="price">$9</var> <small class="text-muted"> $6 each</small> </div>
                                </td>
                                <td class="text-right d-none d-md-block">
                                    <a href="" class="btn btn-light btn-round" data-abc="true"> Remove</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">$69.97</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                        </dl>
                        <hr>
                        <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Alışverişi Tamamla</a>
                        <a href="#" class="btn btn-out btn-success btn-square btn-main" data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
