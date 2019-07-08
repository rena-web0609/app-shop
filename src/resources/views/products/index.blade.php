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
         <span class="js-MsArea"></span>
         <div class="js-remove-product">
         @foreach($products as $product)
         <a id="name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
         <img src="{{ asset('/storage/pic/'.$product->pic) }}">
         @endforeach
             </div>
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
                }).done(function (data) {
                //通信成功時の処理
                var len = data.length;
                for(var i = 0; i < len; i++) {
                    console.log(data);
                    $('.js-remove-product').replaceWith($("<a>").attr({"id": name, "href": '{{ route('products.show', ['product' => $product->id]) }}' }).text(data[i].name));
                    $('.js-get-product').append($("<img>").attr({"src" : '{{ asset('/storage/pic/'.$product->pic) }}'}));
                }
                }).fail(function (data) {
                //通信失敗時の処理
                    alert(data)
                    $(".js-MsArea").html('検索に一致するものはありませんでした');
            });
        });
    });
</script>
