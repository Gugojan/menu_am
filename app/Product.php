<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product','price',"image"];
    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
