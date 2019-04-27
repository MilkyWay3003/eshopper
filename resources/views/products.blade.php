
@include('layouts.header')


@include('layouts.sidebar')


@include('alert')

<section>
    <div class="" style = "margin-left:100px;margin-right:100px;">
        <div class="row">

            @include('layouts.sidebarMain')


            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>
                    @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img style="width:200px;height:200px;" src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="" />
                                    <h2>{{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$product->price}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="{{route('addToCart',['id' => $product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">

                                </ul>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div><!--features_items-->
                      {{$products->links()}}
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')