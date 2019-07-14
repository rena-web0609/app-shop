<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Category;

class CategoryController extends Controller
{
    public function list(Request $request, int $sex)
    {
        $products = Product::where(['category_id' => $sex])->get();

        return view('products.category',[
            'products' => $products,
         ]);
    }
}
