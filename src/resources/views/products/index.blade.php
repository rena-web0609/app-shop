@extends('layout')

@section('content')

    <div class="container">
        <form method="get" action="" class="formArea">
            @csrf
            <input type="text" name="search" class="inputText js-get-val-search" placeholder="検索">
            <input type="hidden"><i class="fas fa-search js-click"></i>
        </form>
        <h1>商品一覧</h1>
    <div class="products js-get-product">
         <div class="js-remove-product">
             @foreach($products as $product)
             <div class="index-product">
                 <img class="index-img" src="data:image/jpeg;base64, {{ $product->pic }}">
                 <a id="name" class="product-name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
             </div>
             @endforeach
         </div>
      </div>
    </div>
@endsection

