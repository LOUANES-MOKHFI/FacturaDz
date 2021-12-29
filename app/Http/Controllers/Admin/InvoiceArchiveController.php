<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvoicesRequest;
use App\Models\Invoice;
use App\Models\Invoices_details;
use App\Models\Invoices_Attachements;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Uuid;
use DB;
use Auth;
use Str;
class InvoiceArchiveController extends Controller
{
    public function index()
    {
        $data=[];
        $data['invoices'] = Invoice::onlyTrashed()->get();
        return view('admin.invoices.archive_invoice',$data);
    }

    public function update(Request $request)
 	{
         $uuid = $request->uuid;
         $flight = Invoice::withTrashed()->where('uuid', $uuid)->restore();
         return redirect()->back()->with(['success'=>'La facture a étè Désarchivée']);
    }

    public function destroy(Request $request)
    {
        $invoice = Invoice::withTrashed()->where('uuid',$request->uuid)->first();
        if(!$invoice){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        $attachements = Invoices_Attachements::where('invoices_id',$invoice->id)->first();

		if (!empty($attachements->invoice_number)) {

            Storage::disk('public_uploads')->deleteDirectory($attachements->invoice_number);
        }
	    $invoice->forceDelete();
	    return redirect()->back()->with(['success'=>'La facture a étè supprimée']);	    
	}
}
