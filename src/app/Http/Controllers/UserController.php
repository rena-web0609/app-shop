<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class UserController extends Controller
{
    //店舗一覧表示
    public function list()
    {
        $users = User::all();

        return view('users.list',[
            'users' => $users,
        ]);
    }
    //店舗商品一覧
    public function index(Request $request, int $user)
    {
        //user_idが一致する店舗データを表示
        $products = Product::where('user_id', $user)->get();

        return view('users.index',[
            'products' => $products,
        ]);
    }
}
