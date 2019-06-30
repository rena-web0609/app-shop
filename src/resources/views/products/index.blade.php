@extends('layout')

@section('content')
    @foreach($products as $product)
    <a href="">{{ $product->name }}</a>
    @endforeach
@endsection
