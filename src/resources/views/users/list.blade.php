@extends('layout')

@section('content')
    <ul>
        <li><a href={{ route('users.list') }}>店舗一覧</a></li>
        <li><a href="#">ALL</a></li>
        <li><a href="#">WOMEN</a></li>
        <li><a href="#">MAN</a></li>
        <li><a href="#">KIDS</a></li>
    </ul>

    <div class="container">
        <h1>店舗一覧</h1>
        <div class="products js-get-product">
            <div class="js-remove-product">
                @foreach($users as $user)
                    <div class="index-product">
                        <a id="name" class="product-name" href={{ route('users.index', ['shop' => $user->id]) }}>{{ $user->name }}<br></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

