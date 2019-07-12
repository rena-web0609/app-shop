@extends('layout')

@section('content')
    <div class="index-slider">
        <div class="slider">
            <i class="fa fa-angle-left js-slide-prev nav-left"></i>
            <i class="fa fa-angle-right js-slide-next nav-right"></i>
            <ul class="slider-container">
                <li><img class="slider-item slider-item1" src="{{ asset('image/image1.jpg') }}"></li>
                <li><img class="slider-item slider-item2" src="{{ asset('image/image2.jpg') }}"></li>
                <li><img class="slider-item slider-item3" src="{{ asset('image/image3.jpg') }}"></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h1>商品一覧</h1>
    <div class="products js-get-product">
         <div class="js-remove-product">
             @foreach($products as $product)
             <div class="index-product">
                 <img class="index-img" src="{{ asset('/storage/pic/'.$product->pic) }}">
                 <a id="name" class="product-name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
             </div>
             @endforeach
         </div>
      </div>
    </div>

@endsection

