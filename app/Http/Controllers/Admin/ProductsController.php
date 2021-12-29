<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Models\Products;
use App\Models\Category;
use Uuid;
use DB;
use Str;
class ProductsController extends Controller
{
    public function index()
    {
        $data=[];
        $data['products'] = Products::all();
        return view('admin.products.index',$data);
    }

   
    public function create()
    {   
        $data=[];
        $data['categories'] = Category::all();
        return view('admin.products.add',$data);
    }

   
    public function store(ProductsRequest $request)
    {
        try {
        	$product = Products::create([
        		'uuid' => Uuid::generate()->string,
        		'product_name' => $request->product_name,
        		'category_id' => $request->category_id,
        		'description' => $request->description,
        	]);
        	return redirect()->route('admin.products')->with(['success'=>'Le produit est ajoutée avec success']);
        } catch (Exception $e) {
        	return redirect()->route('admin.products')->with(['error'=>'S\'il vous plait, verifier vos informations']);
        }
    }

    
    public function show($uuid)
    {
        
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = Category::all();
        $data['product'] = Products::where('uuid',$uuid)->first();
        if(!$data['product']){
            return redirect()->route('admin.products')->with(['error'=>'ce produit n\'existe pas']);
        }
        return view('admin.products.edit',$data);
    }

    
    public function update(ProductsRequest $request, $uuid)
    {
    	$product = Products::where('uuid',$uuid)->first();
       try {
        	$product->update([
        		'product_name' => $request->product_name,
        		'category_id' => $request->category_id,
        		'description' => $request->description,
        	]);
        	return redirect()->route('admin.products')->with(['success'=>'Le produit est modifiée avec success']);
        } catch (Exception $e) {
        	return redirect()->route('admin.products')->with(['error'=>'S\'il vous plait, verifier vos informations']);
        }
    }

   
    public function destroy($uui)
    {
        $data = [];
        $data['product'] = Products::where('uuid',$uuid)->first();
        if(!$data['product']){
            return redirect()->route('admin.products')->with(['error'=>'ce produit n\'existe pas']);
        }
        $data['product']->delete();
        return redirect()->route('admin.products')->with(['success'=>'Le produit est supprimée avec success']);
    }

    public function getProducts($categoryId){
    	$products = Products::where('category_id',$categoryId)->get();
    	if(!$products){
    		return redirect()->route('admin.products')->with(['error'=>'S\'il vous plait, verifier vos informations']);
    	}
    	return response()->json($products);
    }
}
