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
        $products = Product::find($user)->get();

        return view('users.index',[
            'products' => $products,
        ]);
    }
}
