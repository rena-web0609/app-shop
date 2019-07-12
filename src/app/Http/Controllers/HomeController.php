<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //ログイン後のホーム画面（店舗管理画面）
    public function index()
    {
        return view('home');
    }

    //店舗の商品一覧表示画面
    public function show()
    {
        $user = Auth::user();
        $products = $user->products;

        return view('home.index',[
            'products' => $products,
        ]);
    }
}
