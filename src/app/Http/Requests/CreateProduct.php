<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //バリデーションチェック
    public function rules()
    {
        return [
            'pic' => 'required|image',
            'name' => 'required|max:100',
            'comment' => 'required|max:500',
            'price' => 'required|integer',
        ];
    }

    //入力欄の名称を日本語にカスタマイズ
    public function attributes()
    {
        return [
            'pic' => '商品画像',
            'name' => '商品タイトル',
            'comment' => '説明文',
            'price' => '価格',
        ];
    }

}
