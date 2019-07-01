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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>商品画像<input type="file" name="pic"></label><br>
        <label>商品タイトル（最大100文字）<input type="text" name="name" value="{{ old('name') }}"></label><br>
        <textarea name="comment">{{ old('comment') }}</textarea><br>
        <label>価格（半角数字） ¥<input type="text" name="price" value="{{ old('price') }}">（税込）</label><br>
        <input type="submit" value="登録">
    </form>
@endsection
