@extends('layout')

@section('content')
    <div class="container">
        <h1>店舗商品一覧</h1>
        <div class="products js-get-product">
            <div class="js-remove-product">
                @foreach($products as $product)

                    <div class="index-product">
                        <img class="index-image" src="data:image/jpeg;base64, {{ $product->pic }}">
                        <a id="name" class="product-name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

