@extends('layout')

@section('content')
    <form method="get" action="" class="formArea">
        @csrf
        <div id="ajaxArea">
            <input type="text" name="search" class="inputText js-get-val-search">
            <input type="submit" value="検索" class="btn">
        </div>
    </form>

    <ul>
        <li><a href={{ route('products.create') }}>商品登録</a></li>
    </ul>

     <div class="js-get-product">
         @foreach($products as $product)
         <a href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
         <img src="{{ asset('/storage/pic/'.$product->pic) }}">
         @endforeach
      </div>

@endsection
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    $(function() {
        $('.formArea').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'get',
                url: '/api/v1/products',
                dataType: 'json',
                data: {search: $(".js-get-val-search").val()}
                }).done(function (products) {
                    alert("成功");
                //通信成功時の処理
                $.each(products, function(product){
                    $(".js-get-product").html('<div>' + product.name + '</div>');
                })
                }).fail(function () {
                //通信失敗時の処理
                $(".js-get-product").html('検索に一致するものはありませんでした');
            });
        });
    });
</script>
