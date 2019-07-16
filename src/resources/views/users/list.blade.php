@extends('layout')

@section('content')

    <div class="container">
        <h1>店舗一覧</h1>
        <div class="shops">
                @foreach($users as $user)
                    <div class="list-shop">
                        <a id="name" class="shop-name" href={{ route('users.index', ['shop' => $user->id]) }}>{{ $user->name }}<br></a>
                    </div>
                @endforeach
        </div>
    </div>
@endsection

