<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">    <title>SHOP</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href={{ route('products.index') }}>SHOP</a>
    </nav>
    <span class="js-MsArea"></span>

    <ul class="index-category">
        <li><a href={{ route('users.list') }}>店舗一覧</a></li>
        <li><a href={{ route('products.index') }}>ALL</a></li>
        <li><a href={{ route('products.category', ['sex' => '0']) }}>WOMEN</a></li>
        <li><a href={{ route('products.category', ['sex' => '1']) }}>MAN</a></li>
        <li><a href={{ route('products.category', ['sex' => '2']) }}>KIDS</a></li>
    </ul>
</header>
<main>
    @yield('content')
    @if(Auth::user())
    <ul class="left-nav">
        <li>マイページメニュー</li>
        <li><a href={{ route('products.create') }}>商品を登録する</a></li>
        <li><a href={{ route('home.show') }}>店舗商品一覧</a></li>
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
    @endif
    <footer>
        <div class="footer">
            <a href={{ route('login') }} class="login-admin">店舗管理者の方はこちら</a>
            <a>Copyright Rena Sasaki All Rights Reserved.</a>
        </div>
    </footer>
</main>
</body>
</html>
