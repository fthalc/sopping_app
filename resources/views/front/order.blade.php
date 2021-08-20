@extends('front.layouts.master')
@section('content')
    <div class="row">
        <div class="row-cols-sm-10">
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
                                        <tr>
                                            <td>
                                                <figure class="itemside align-items-center">
                                                    <div class="aside"><img style="width: 100px;" src="/image.png" class="img-sm"></div>
                                                    <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">name</a>
                                                        <p class="small text-muted">SIZE:M <br> Brand: Cantabil</p>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td>
                                                <input type="number" name="urun_adet" required max="10" value="1">
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <var class="price">Fiyat ₺</var>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-2 alert-success "> Alışveriş başarıyla tamamlandı</div>
    </div>

@endsection
