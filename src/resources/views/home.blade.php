@extends('layout')

@section('content')
    <ul class="left-nav">
        <li>マイページメニュー</li>
        <li><a href={{ route('products.create') }}>商品を登録する</a></li>
        <li><a href="#">店舗商品一覧</a></li>
        <li><a href="#">ガイド</a></li>
        <li><a href="#">お問い合わせ</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <div class="container">
        <h1>店舗管理@店</h1>
        <h2>登録商品</h2>
        <p>全点</p>
        <div>
            <img src="#">
            <a href=""></a>
        </div>
    </div>

@endsection
