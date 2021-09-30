<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Category;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $data=[];
        $data['invoices'] = Invoice::all();
        return view('admin.invoices.index',$data);
    }

   
    public function create()
    {
        return view('admin.invoices.add');
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($uuid)
    {
        
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['invoice'] = Invoice::where('uuid',$uuid)->first();
        if(!$data['invoice']){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        return view('admin.invoices.edit',$data);
    }

    
    public function update(Request $request, $uuid)
    {
        //
    }

   
    public function destroy($uui)
    {
        //
    }
}
