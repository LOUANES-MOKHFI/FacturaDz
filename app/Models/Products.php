<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }
}
