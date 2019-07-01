@extends('layout')

@section('content')
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <label>商品画像<input type="file" name="pic"></label><br>
        <label>商品タイトル（最大100文字<input type="text" name="name" value="{{ $product->name }}"></label><br>
        <textarea name="comment">{{ $product->comment }}</textarea><br>
        <label>価格<input type="text" name="price" value="{{ $product->price }}"></label><br>
        <input type="submit" value="登録">
    </form>
@endsection
