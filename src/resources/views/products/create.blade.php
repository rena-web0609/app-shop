@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="create-site-width">
        <h1>商品登録フォーム</h1>
        <form class="create-form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>商品画像<input type="file" name="pic"></label><br>
            <label>商品タイトル（最大100文字）<input type="text" name="name" class="create-name" value="{{ old('name') }}"></label><br>
            <label>商品説明文（最大500文字）</label><br>
            <textarea name="comment" class="create-comment">{{ old('comment') }}</textarea><br>
            <label>価格（半角数字）<br> ¥<input type="text" name="price" class="create-price" value="{{ old('price') }}">（税込）</label><br>
            <input type="submit" value="登録">
        </form>
        </div>
    </div>
@endsection
