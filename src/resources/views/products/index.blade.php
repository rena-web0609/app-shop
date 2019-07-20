@extends('layout')

@section('content')

    <div class="container">
        <h1>商品一覧</h1>
    <div class="products js-get-product">
         <div class="js-remove-product">
             @foreach($products as $product)
             <div class="index-product">
                 <img class="index-img" src="data:pic/png;base64, <?= pic ?>">
                 <img class="index-img" src="data:pic/png;base64, {{ $product->pic }}">
                 <img class="index-img" src="data:image/png;base64, {{ $product->pic }}">
                 <a id="name" class="product-name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
             </div>
             @endforeach
         </div>
      </div>
    </div>
@endsection

