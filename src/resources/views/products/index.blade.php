@extends('layout')

@section('content')
    <ul>
        <li><a href={{ route('products.create') }}>商品登録</a></li>
    </ul>
    @foreach($products as $product)
    <a href="">{{ $product->name }}</a>
    @endforeach
@endsection
