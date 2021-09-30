<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class SettingsController extends Controller
{
    public function index(){
    	$data=[];
    	$data['categories'] = Category::all();
    	return view('admin.settings.index',$data);
    }
}
