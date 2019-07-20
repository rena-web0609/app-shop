<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProduct;
use Illuminate\Http\Request;
use App\Product;
use Auth;
use Api;
use DB;

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

        //一覧表示画面を表示
        return view('products.index', [
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
        $categoryId = Category::select('id', 'name')->get()->pluck('name');

        return view('products.create',[
            'categoryId' => $categoryId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    //商品登録
    /**
     * @param CreateProduct|Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(CreateProduct $request)
    {
        //商品画面作成
        $product = new Product();
        //入力情報取得
        $product->fill($request->all());

        //画像(local)
        //$filename = $request->pic->store('public/pic');
        //$product->pic = basename($filename);

        //heroku
        $pic = base64_encode(file_get_contents($request->pic->getRealPath()));
        DB::table('products')->insert([
            "pic" => $pic
        ]);

        //'user_id'挿入
        $id = Auth::id();
        $product->user_id = $id;

        //保存
        $product->save();

        //商品詳細画面へ遷移
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    //商品詳細画面
    public function show(Request $request, int $productId)
    {
        //idが一致する商品を取得
        $product = Product::find($productId);

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    //商品編集画面表示
    public function edit(Request $request, int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    //商品編集
    /**
     * @param CreateProduct|Request $request
     * @param int $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(CreateProduct $request, int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        //変更情報取得
        $product->fill($request->all());

        //変更画像があれば挿入
        if (!empty($request->pic)) {
            //lolal
            //$filename = $request->pic->store('public/pic');
            //$product->pic = basename($filename);

            //heroku
            $pic = base64_encode(file_get_contents($request->pic->getRealPath()));
            DB::table('products')->insert([
                "pic" => $pic
            ]);
        }

        //保存
        $product->save();

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    //商品削除
    public function destroy(Request $request, int $product)
    {
        //idが一致する商品を取得
        $product = Product::find($product);

        //削除
        $product->delete();

        //一覧表示画面へ遷移
        return redirect()->route('products.index');
    }

    //検索機能
    public function getSearchByProduct(Request $request)
    {
        header("Content-type: application/json; charset=UTF-8");

        //検索した値を取得
        $search = $request->search;

        //検索した値と商品タイトルに一致するデータを取得
        $products = Product::where('name', 'like', '%'.$search.'%')->get();

        //レスポンスをjson形式で返す
        echo json_encode($products);
    }
}
