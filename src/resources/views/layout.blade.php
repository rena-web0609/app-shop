<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SHOP</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href={{ route('products.index') }}>SHOP</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
@yield('scripts')
</body>
</html>
