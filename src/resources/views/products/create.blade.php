@extends('layout')

@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>商品画像<input type="file" name="pic"></label><br>
        <label>商品タイトル（最大100文字<input type="text" name="name"></label><br>
        <textarea name="comment"></textarea><br>
        <label>価格<input type="text" name="price"></label><br>
        <input type="submit" value="登録">
    </form>
@endsection
