<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices_details extends Model
{
    use SoftDeletes;
    protected $table = 'invoices_details';
    protected $guarded = [];

    public function categorys(){
    	return $this->belongsTo(Category::class,'category');
    }
    public function products(){
    	return $this->belongsTo(Products::class,'product');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
}
