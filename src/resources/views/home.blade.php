@extends('layout')

@section('content')

    <div class="container">
        <h1>店舗管理 @ {{  Auth::user()->name }}店</h1>
        <div class="home-icon">
        <p>メニューから店舗情報を確認できます</p>
        </div>
    </div>
@endsection
