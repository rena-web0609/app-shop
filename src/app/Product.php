<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Product extends Model
{
    protected $fillable = [
        'name', 'comment', 'price', 'pic'
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
