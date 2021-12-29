@extends('admin.layouts.admin')

@section('title')
{{__('admin/invoices.add_invoice')}}
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
                                <li class="breadcrumb-item active">{{__('admin/invoices.add_invoice')}}
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
                                    <h4 class="card-title" id="basic-layout-form">  {{__('admin/invoices.add_invoice')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.invoices.store')}}" method="POST" 
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.invoice_num')}}</label>
                                                            <input type="text" value="{{old('invoice_number')}}" id="name"
                                                                   class="form-control" placeholder="  " name="invoice_number">
                                                            @error("invoice_number")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.invoice_date')}}</label>
                                                                   <input type="date" id="name" value="{{date('Y-m-d')}}" 
                                                                   class="form-control" placeholder=" " name="invoice_date">
                                                            @error("invoice_date")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.due_date')}}</label>
                                                                   <input type="date" value="{{old('due_date')}}" id="name"
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
                                                            <select class="form-control" name="category_id" id="category">
                                                                <option>{{__('admin/invoices.chose_categories')}}</option>
                                                                @isset($categories)
                                                                    @foreach($categories as $key=>$category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                            @error("category_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.product')}}</label>
                                                            <select class="form-control" name="product_id" id="products">
                                                               
                                                            </select>
                                                            @error("product_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Amount_collection')}}</label>
                                                                   <input type="text" value="{{old('Amount_collection')}}" id="name"
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
                                                            <input type="text" value="{{old('amount_Commission')}}"
                                                                   class="form-control" placeholder=" " id="amount_Commission" name="amount_Commission">
                                                            @error("amount_Commission")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.discount')}}</label>
                                                           <input type="text" value="0"
                                                                   class="form-control" placeholder=" "  id="discount" name="discount">
                                                            @error("discount")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.Rate_vat')}}</label>
                                                            <select class="form-control" id="Rate_vat" name="Rate_vat" onchange="Calculate()">
                                                                <option></option>
                                                                <option value="5%">5%</option>
                                                                <option value="10%">10%</option>
                                                            </select>
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
                                                            <input type="text"  value="{{old('Rate_vat')}}"
                                                                   class="form-control" placeholder=" "  id="Value_VAT" name="Value_VAT" readonly>
                                                            @error("Value_VAT")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.total')}}</label>
                                                           <input type="text"  value="{{old('total')}}" id="total"
                                                                   class="form-control" placeholder=" " name="total" readonly>
                                                            @error("total")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/invoices.note')}}</label>
                                                            <textarea type="text" id="name" class="form-control" placeholder=" " name="note">
                                                                   {{old('note')}}
                                                            </textarea>
                                                            
                                                            @error("note")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <span style="color: red;font-size: 13px">* {{__('admin/invoices.file')}} pdf,jpeg,jpg,png</span> <br>
                                                            <label for="projectinput1">{{__('admin/invoices.attachments')}}</label>
                                                            <input type="file" id="input-file-now" class="dropify" name="attachments" accept=".pdf,.jpg, .png, image/jpeg, image/png" />
                                                            @error("attachments")
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
                                                    <i class="la la-check-square-o"></i> {{__('admin/invoices.save')}}
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
