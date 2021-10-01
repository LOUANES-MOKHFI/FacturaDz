<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function index()
    {
        $data=[];
        $data['categories'] = Category::all();
        return view('admin.settings.categories.index',$data);
    }

   
    public function create()
    {
        return view('admin.settings.categories.add');
    }

   
    public function store(CategoryRequest $request)
    {	
    	
    	try {
    		$category = Category::create([
        	'name' => $request->name,
        	'description' => $request->description,
        	]);
        	return redirect()->route('admin.settings.categories')->with(['success' => 'La categorie est ajoutée avec success']);
    	} catch (Exception $e) {
    		return redirect()->route('admin.settings.categories')->with(['error' => 'Verifiez vos informations !!']);
    	}
        


    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data = [];
        $data['category'] = Category::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories')->with(['error'=>'cette categorie n\'existe pas']);
        }
        return view('admin.settings.categories.edit',$data);
    }

    
    public function update(CategoryRequest $request, $id)
    {
        $data = [];
        $data['category'] = Category::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $data['category']->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.settings.categories')->with(['success' => 'La categorie est modifiée avec success']);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['category'] = Category::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $data['category']->delete();

        return redirect()->route('admin.settings.categories')->with(['success' => 'La categorie est supprimée avec success']);

    }
}
