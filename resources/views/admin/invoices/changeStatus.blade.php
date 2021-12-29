@extends('admin.layouts.admin')

@section('title')
{{__('admin/invoices.changePayment_status')}}
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Accueil </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.invoices')}}"> {{__('admin/invoices.all_invoices')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/invoices.changePayment_status')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body small-spacing">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="box-content">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">  {{__('admin/invoices.changePayment_status')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.invoices.changeStatus',$invoice->uuid)}}" method="POST" 
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.invoice_num')}}</label>
                                                            <input type="text" value="{{$invoice->invoice_number}}" id="name"
                                                                   readonly class="form-control" placeholder="  " name="invoice_number">
                                                            @error("invoice_number")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.invoice_date')}}</label>
                                                                   <input type="date" value="{{$invoice->invoice_date}}" id="name"
                                                                   readonly class="form-control" placeholder=" " name="invoice_date">
                                                            @error("invoice_date")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.due_date')}}</label>
                                                                   <input type="date" value="{{$invoice->due_date}}" id="name" readonly
                                                                   class="form-control" placeholder=" " name="due_date">
                                                            @error("due_date")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.categories')}}</label>
                                                            <select class="form-control" readonly name="category_id" id="category">
                                                            	<option value="{{$invoice->category_id}}">{{$invoice->category->name}}</option>
                                                            </select>
                                                            @error("category_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.product')}}</label>
                                                            <select class="form-control" readonly name="product_id" id="products">
                                                               <option value="{{$invoice->product}}">{{$invoice->products->product_name}}</option>
                                                            </select>
                                                            @error("product_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Amount_collection')}}</label>
                                                                   <input type="text" readonly value="{{$invoice->Amount_collection}}" id="name"
                                                                   class="form-control" placeholder=" " name="Amount_collection">
                                                            @error("Amount_collection")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Amount_Commission')}}</label>
                                                            <input type="text" readonly value="{{$invoice->Amount_Commission}}" class="form-control" placeholder=" " id="amount_Commission" name="amount_Commission">
                                                            @error("amount_Commission")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.discount')}}</label>
                                                           <input type="text" readonly value="{{$invoice->discount}}"
                                                                   class="form-control" placeholder=" "  id="discount" name="discount">
                                                            @error("discount")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Rate_vat')}}</label>
                                                            <input type="text" class="form-control" readonly name="Rate_vat" value="{{$invoice->Rate_vat}}">
                                                            @error("Rate_vat")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Value_VAT')}}</label>
                                                            <input type="text"  value="{{$invoice->Value_VAT}}"
                                                                   class="form-control" placeholder=" "  id="Value_VAT" name="Value_VAT" readonly>
                                                            @error("Value_VAT")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.total')}}</label>
                                                           <input type="text"  value="{{$invoice->total}}" id="total"
                                                                   class="form-control" placeholder=" " name="total" readonly>
                                                            @error("total")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.note')}}</label>
                                                            <textarea type="text" readonly id="name" class="form-control" placeholder=" " name="note">
                                                                   {{$invoice->note}}
                                                            </textarea>
                                                            
                                                            @error("note")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-md-6">
                                                		<div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.status')}}</label>
                                                          	<select class="form-control" name="status" required="">
                                                          		<option selected="true" disabled="disabled" value="">-- {{__('admin/invoices.chose_status')}} --</option>
                                                          		<option value="payé">{{__('admin/invoices.payed')}}</option>
                                                          		<option value="Partiellement payé">{{__('admin/invoices.partialy_payed')}}</option>
                                                          	</select>
                                                            @error("status")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                	</div>
                                                	<div class="col-md-6">
                                                		<div class="form-group">
                                                            <label for="projectinput1">Date de paiment</label>
                                                           <input type="date"  value="{{old('Payment_Date')}}" id="Payment_Date"
                                                                   class="form-control" placeholder=" " name="Payment_Date">
                                                            @error("Payment_Date")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                	</div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/invoices.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/invoices.changePayment_status')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    
function Calculate(){
    
    var amount_Commission = parseFloat(document.getElementById("amount_Commission").value);
    var discount = parseFloat(document.getElementById("discount").value);
    var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
    var Rate_vat = parseFloat(document.getElementById("Rate_vat").value);
        if(typeof discount === 'undifined'){
            alert("s'il vous plait, entrer la réduction > ou = à 0");
        }
        else{
            var Amount_Commission2 = amount_Commission - discount;
            if(typeof amount_Commission === 'undifined' || !amount_Commission){
                alert("s'il vous plait, entrer la Montant Commission");
            }else{
                var intResult = Amount_Commission2 * Rate_vat/100;
                var intResult2 = parseFloat(intResult + Amount_Commission2);
                sumq = parseFloat(intResult).toFixed(2);
                sumt = parseFloat(intResult2).toFixed(2);
                document.getElementById("Value_VAT").value = sumq;
                document.getElementById('total').value = sumt
            }
        }
   
   
}



</script>
<script type="text/javascript">

$('#category').on('change',function(e){
var category_id = e.target.value;
$('#products').empty();
//ajax
$.ajax({
    type: "GET",
    url: "/admin/products/get-product/"+category_id,
    success:function(products){
        if(products.length != 0){
            products.forEach(element =>
            {
                $('#products').append('<option value="' +element.id+'">'+ element.product_name+'</option>');
            });
        }
    }
    });
});
</script>
@endsection
