<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //一覧表示機能
    public function index()
    {
        //productsテーブル全カラム
        $products = Product::all();

        return view('products.index',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //商品登録画面表示
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //商品登録
    public function store(Request $request)
    {
        //商品画面作成
        $product = new Product();
        //入力情報取得
        $product -> fill($request->all());

        //画像
        $filename = $request->pic->store('public/pic');
        $product->pic = basename($filename);

        //保存
        $product->save();

        redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品詳細画面
    public function show(Request $request,int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        return view('products.show',[
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品編集画面表示
    public function edit(Request $request, int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        return view('products.edit',[
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品編集
    public function update(Request $request,int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        //変更情報取得
        $product -> fill($request->all());

        //変更画像があれば挿入
        if(!empty($request->pic)){
            $filename = $request->pic->store('public/pic');
            $product->pic = basename($filename);
        }

        //保存
        $product->save();

        return view('products.show',[
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品削除
    public function destroy(Request $request, int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        //削除
        $product->delete();

        return redirect()->route('products.index');
    }
}
