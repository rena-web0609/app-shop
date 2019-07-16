<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Product extends Model
{
    protected $fillable = [
        'name', 'comment', 'price', 'pic', 'category_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
