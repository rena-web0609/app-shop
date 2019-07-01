@extends('layout')

@section('content')

    <ul>
        <li><a href={{ route('products.create') }}>商品登録</a></li>
    </ul>
    @foreach($products as $product)
    <a href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}<br></a>
    <img src="{{ asset('/storage/pic/'.$product->pic) }}">
    @endforeach

@endsection
