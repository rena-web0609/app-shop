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
    <form method="get" action="" class="formArea">
        @csrf
        <input type="text" name="search" class="inputText js-get-val-search" placeholder="検索">
        <i class="fas fa-search js-click"></i>
    </form>
</header>
<main>
    @yield('content')
    <footer><div class="footer"><a>Copyright Rena Sasaki All Rights Reserved.</a></div></footer>
</main>
@yield('scripts')
</body>
</html>
