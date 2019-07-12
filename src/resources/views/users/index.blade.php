@extends('layout')

@section('content')
    <ul class="menu">
        <li><a href={{ route('users.list') }}>店舗一覧</a></li>
        <li><a href={{ route('products.index') }}>ALL</a></li>
        <li><a href="#">WOMEN</a></li>
        <li><a href="#">MAN</a></li>
        <li><a href="#">KIDS</a></li>
    </ul>

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

