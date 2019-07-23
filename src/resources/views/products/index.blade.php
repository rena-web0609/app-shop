@extends('layout')

@section('content')
    <div class="container">
        <form method="get" action="" class="formArea">
            @csrf
            <input type="text" name="search" class="inputText js-get-val-search" placeholder="検索">
            <input type="submit" value="検索" class="js-click index-search">
        </form>
        <h1>商品一覧</h1>
        <span class="js-MsArea"></span>
    <div class="products js-get-product">
             @foreach($products as $product)
             <div class="index-product">
                 <img class="index-img" src="{{ asset('/storage/pic/'.$product->pic) }}">
                 <a id="name" class="product-name" href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
             </div>
             @endforeach
      </div>
    </div>
@endsection
<script
    src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('.formArea').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'get',
            url: '/api/v1/products',
            dataType: 'json',
            data: {
                search: $('.js-get-val-search').val()
            },
        }).done(function (data) {
                //通信成功時の処理
                //alert(data);
                $(".index-product").empty();
                $(".index-product").remove();
                var len = data.length;
                if(len === 0){
                    $(".js-MsArea").html('検索に一致する商品がありませんでした');
                }else{
                    console.log(data);
                    $(".js-MsArea").html('検索に一致する商品がありました');
                    for (var i = 0; i < len; i++) {
                        var id = data[i].id;
                        var pic = data[i].pic;
                        var name = data[i].name;

                        $(".js-get-product").append($("<div class='index-product'>").append("<img>").append("<a class='product-name'>"));

                        $("img").attr({
                            "src": '/storage/pic/'+ pic,
                            "class": 'index-img',
                        });

                        $(".product-name").text(name);
                        $("a").attr({
                            "id": 'name',
                            "href": '/products/'+ id,
                            "style": 'bottom: -25px',
                        });
                    }
                }
        }).fail(function (data) {
                //通信失敗時の処理
                //alert(data);
            });
        });
    });
</script>
