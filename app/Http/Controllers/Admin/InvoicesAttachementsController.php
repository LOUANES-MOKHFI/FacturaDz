<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoices_details;
use App\Models\Invoices_Attachements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class InvoicesAttachementsController extends Controller
{
	public function store(Request $request){
		//return $request;
		$this->validate($request, [

        'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'Le format de fichier doit étre  pdf, jpeg , png , jpg',
        ]);
        
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachments =  new Invoices_Attachements();
        $attachments->file_name = $file_name;
        $attachments->invoice_number = $request->invoice_number;
        $attachments->invoices_id = $request->invoices_id;
        $attachments->user_id = Auth::user()->id;
        $attachments->save();
           
        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachements/'. $request->invoice_number), $imageName);
        
        return redirect()->back()->with(['success'=> 'Le fichier a étè ajoutée avec success']);
        
	}
    public function destroy(Request $request){
    	$invoice = Invoices_Attachements::findOrfail($request->file_id);
    	$invoice->delete();
    	Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
    	return redirect()->back()->with(['success'=>'Le fichier a étè supprimée avec success']);
    }

    public function open($invoice_number,$file_name){
    	$file = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
    	return response()->file($file);
    }

    public function download($invoice_number,$file_name){
    	$content = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
    	return response()->download($content);

    }
}
