@extends('layout')

@section('content')
    <ul>
        <li><a href={{ route('products.edit',['product' => $product->id]) }}>商品編集</a></li>
        <form action={{ route('products.destroy', [$product->id]) }} id="form_{{ $product->id }}" method="post">
            @method("delete")
            @csrf
            <li><a href="#" data-id="{{ $product->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a></li>
        </form>
    </ul>
    <div>
        <img src="{{ $product->pic }}">
        <p>{{ $product->name }}</p>
        <p>{{ $product->comment }}</p>
        <p>{{ $product->price }}</p>
    </div>
@endsection
<script>
    function deletePost(e) {
        'use strict';

        if (confirm('本当に削除していいですか?')) {
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
</script>
