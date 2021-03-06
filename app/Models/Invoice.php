<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invoice extends Model
{
	use SoftDeletes;
    protected $table = 'invoices';
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }
    public function products(){
    	return $this->belongsTo(Products::class,'product');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

}
