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
class InvoiceController extends Controller
{
    
    public function index()
    {
        $data=[];
        $data['invoices'] = Invoice::all();
        return view('admin.invoices.index',$data);
    }

    public function Paid(){
        $invoices = Invoice::where('value_status', 1)->get();
        return view('admin.invoices.invoices_paid',compact('invoices'));
    }
    public function notPaid(){
        $invoices = Invoice::where('value_status',2)->get();
        return view('admin.invoices.invoices_unpaid',compact('invoices'));
    }
    public function PartialyPaid()
    {
        $invoices = Invoice::where('value_status',3)->get();
        return view('admin.invoices.invoices_Partial',compact('invoices'));
    }

   
    public function create()
    {   
        $data=[];
        $data['categories'] = Category::all();
        return view('admin.invoices.add',$data);
    }

   
    public function store(InvoicesRequest $request)
    {
        //return $request;
        try {
            $invoice = Invoice::create([
                'uuid' => Uuid::generate()->string,
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'product' => $request->product_id,
                'category_id' => $request->category_id,
                'Amount_collection' => $request->Amount_collection,
                'Amount_Commission' => $request->amount_Commission,
                'discount' => $request->discount,
                'Value_VAT' => $request->Value_VAT,
                'Rate_vat' => $request->Rate_vat,
                'total' => $request->total,
                'status' => 'Non Payé',
                'value_status' => 2,
                'note'   => $request->note,
                'user_id' => Auth::user()->id,
            ]);

            ///Invice details
            $invoice_details = Invoices_details::create([
                'invoices_id'     => $invoice->id,
                'invoice_number'  =>$invoice->invoice_number,
                'product'         =>$invoice->product,
                'category'        =>$invoice->category_id,
                'status'          =>$invoice->status,
                'value_status'    =>$invoice->value_status,
                'note'            =>$invoice->note,
                'user_id'         => Auth::user()->id,
            ]);
            if($request->hasFile('attachments')){
               // $this->validate($request,['attachments'=> 'required|mimes:pdf|max:10000'],['attachments.mimes' => "errur!, la facture a étè enregistrer sans les Pièces jointes car il n'est pas sous format pdf"]);
                $image = $request->file('attachments');
                $file_name = $image->getClientOriginalName();

                $attachements = new Invoices_Attachements();
                $attachements->file_name = $file_name;
                $attachements->invoice_number= $invoice->invoice_number;
                $attachements->user_id = Auth::user()->id;
                $attachements->invoices_id = $invoice->id;
                $attachements->save();

                ///Move Attachements
                $imageName = $request->attachments->getClientOriginalName();
                $request->attachments->move(public_path('Attachements/'.$attachements->invoice_number),$imageName);

            }



            return redirect()->route('admin.invoices')->with(['success'=>'La facture a étè ajoutée avec success']);
        } catch (Exception $e) {
            return redirect()->route('admin.invoices')->with(['error'=>'s\'il vous plait, verifier vos informtions']);
        }
    }

    
    public function show($uuid)
    {
        $data = [];
        $data['invoice'] = Invoice::where('uuid',$uuid)->first();
        if(!$data['invoice']){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        $invoiceId = $data['invoice']->id;
        $data['details'] = Invoices_details::where('invoices_id',$invoiceId)->get();
        $data['attachements'] = Invoices_Attachements::where('invoices_id',$invoiceId)->get();
        return view('admin.invoices.show',$data);
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = Category::all();
        $data['invoice'] = Invoice::where('uuid',$uuid)->first();
        if(!$data['invoice']){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        return view('admin.invoices.edit',$data);
    }

    
    public function update(InvoicesRequest $request, $uuid)
    {   
        $invoice = Invoice::where('uuid',$uuid)->first();
        if(!$invoice){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        try {
            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'product' => $request->product_id,
                'category_id' => $request->category_id,
                'Amount_collection' => $request->Amount_collection,
                'Amount_Commission' => $request->amount_Commission,
                'discount' => $request->discount,
                'Value_VAT' => $request->Value_VAT,
                'Rate_vat' => $request->Rate_vat,
                'total' => $request->total,
                'note'   => $request->note,
            ]);
            $invoices_details = Invoices_details::where('Invoices_id',$invoice->id)->first();
            if(!$invoices_details){
                return redirect()->route('admin.invoices')->with(['error'=>'s\'il vous plait, verifier vos informtions']);
            }
            $invoices_details->update([
                'invoice_number'  =>$invoice->invoice_number,
                'product'         =>$invoice->product,
                'category'        =>$invoice->category_id,
                'note'            =>$invoice->note,
            ]);
            return redirect()->route('admin.invoices')->with(['success'=>'La facture est modifiée avec success']);
        } catch (Exception $e) {
            return redirect()->route('admin.invoices')->with(['error'=>'s\'il vous plait, verifier vos informtions']);
        }
    }

   
    public function destroy(Request $request)
    {
        $uuid = $request->uuid;
        $invoice = Invoice::where('uuid',$uuid)->first();
        $details = Invoices_details::where('invoices_id',$invoice->id)->first();
        $attachements = Invoices_Attachements::where('invoices_id',$invoice->id)->first();
         $id_page =$request->id_page;
        if(!$invoice){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        if (!$id_page==2) {
            if (!empty($attachements->invoice_number)) {

                Storage::disk('public_uploads')->deleteDirectory($attachements->invoice_number);
            }

            $invoice->forceDelete();
            return redirect()->route('admin.invoices')->with(['success'=>'La facture a étè supprimée avec success']);
        }else{
            $invoice->delete();
            return redirect()->route('admin.invoices')->with(['success'=>'La facture a étè archivée avec success']);

        }

    }

    public function GetchangeStatus($uuid){
        $data = [];
        $data['invoice'] = Invoice::where('uuid',$uuid)->first();
        if(!$data['invoice']){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        return view('admin.invoices.changeStatus',$data);
    }
    public function PostchangeStatus(Request $request,$uuid){
        $data = [];
        $data['categories'] = Category::all();
        $data['invoice'] = Invoice::where('uuid',$uuid)->first();
        if(!$data['invoice']){
            return redirect()->route('admin.invoices')->with(['error'=>'cette facture n\'existe pas']);
        }
        if ($request->status === 'payé') {

            $data['invoice']->update([
                'value_status' => 1,
                'status' => $request->status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            Invoices_details::create([
                'invoices_id' => $data['invoice']->id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product_id,
                'category' => $request->category_id,
                'status' => $request->status,
                'value_status' => 1,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user_id'      => Auth::user()->id,
            ]);
        }else{
            $data['invoice']->update([
                'value_status' => 3,
                'status' => $request->status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            Invoices_details::create([
                'invoices_id' => $data['invoice']->id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product_id,
                'category' => $request->category_id,
                'status' => $request->status,
                'value_status' => 3,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user_id'      => Auth::user()->id,
            ]);
        }

        return redirect()->route('admin.invoices')->with(['success'=>'Le status de la facture a étè modifiée avec success']);
    }

    public function Print($uuid){
        $invoice = Invoice::where('uuid', $uuid)->first();
        return view('admin.invoices.Print_invoice',compact('invoice'));
    }
}
