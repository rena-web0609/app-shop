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
                    if(data) {
                        //一致する商品があるとき
                        var len = data.length;
                        var str = $('.js-remove-product');

                        for (var i = 0; i < len; i++) {
                            str.replaceWith($("<a>").attr({
                                "id": 'name',
                                "href": '{{ route('products.show', ['product' => $product->id]) }}'
                            }).text(data[i].name));

                            $('#name').after($("<img>").attr({
                                "src": '{{ asset('/storage/pic/'.$product->pic) }}'
                            }));
                        }
                    }else{
                        //一致する商品がないとき
                            $('.js-remove-product').text('検索に一致するものはありませんでした');
                        }
                }).fail(function (data) {
                //通信失敗時の処理
                console.log('error'.data);
            });
        });
    });
</script>
