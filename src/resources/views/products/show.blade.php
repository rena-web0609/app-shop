@extends('layout')

@section('content')
    <ul class="nav-top">
        <li><a href={{ route('products.index') }}> > 戻る</a></li>
    </ul>
    <div class="container show-product">
        <img class="show-image" src="{{ asset('/storage/pic/'.$product->pic) }}">
        <h2 class="content-name">{{ $product->name }}</h2>
        <p class="content-price">¥ {{ $product->price }}（税込み）</p>
        <p class="content-comment">{{ $product->comment }}</p>
    @if(Auth::id() == $product->user_id)
    <ul class="nav-bottom">
        <li class="show-edit"><a href={{ route('products.edit',['product' => $product->id]) }}>商品編集</a></li>
        <form action={{ route('products.destroy', [$product->id]) }} id="form_{{ $product->id }}" method="post">
            @method("delete")
            @csrf
            <li class="show-delete"><a href="#" data-id="{{ $product->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a></li>
        </form>
    </ul>
    @endif
    </div>
@endsection
@yield('script')
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    function deletePost(e) {
        'use strict';

        if (confirm('本当に削除していいですか?')) {
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
    $(function() {
        $('.formArea').click('js-click', function (e) {
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
                    $('.js-get-product').append($("<img>").attr({"src" : 'data:pic/jpeg;base64,{{ $product->pic }}'}));
                }
            }).fail(function (data) {
                //通信失敗時の処理
                alert(data)
                $(".js-MsArea").html('検索に一致するものはありませんでした');
            });
        });
    });
</script>
