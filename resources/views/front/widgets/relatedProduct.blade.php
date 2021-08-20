<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach($related_products as $related_product)
                <div class="col mb-5 ">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{route('single',[$related_product->getCategory->slug,$related_product->slug])}}"><img class="card-img-top" src="{{$related_product->image}}" alt="..." /></a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <a class="text-decoration-none text-black" href="#"><h5 class="fw-bolder">{{$related_product->name}}</h5></a>
                                <h6 class="fw-lighter">{{Str::limit($related_product->description,30)}}</h6>
                                <h6 class="fw-lighter">{{$related_product->created_at->diffForHumans()}}</h6>
                                <!-- Product price-->
                                <div>
                                    Fiyat : {{$related_product->price}} ₺
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
</section>
