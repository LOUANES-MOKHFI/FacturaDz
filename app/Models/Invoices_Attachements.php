<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices_Attachements extends Model
{
    //use SoftDeletes;
    protected $table = 'invoices_attachements';
    protected $guarded = [];

    public function invoice(){
    	return $this->belongsTo(Invvoice::class,'invoices_id');
    }
    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
    
}
