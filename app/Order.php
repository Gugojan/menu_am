<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','product_id'
    ];
    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
