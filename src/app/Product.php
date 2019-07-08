<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('name', 'comment', 'price', 'pic');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
