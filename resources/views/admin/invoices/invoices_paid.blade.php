@extends('admin.layouts.admin')
@section('title')
{{__('admin/navBar.paid_invoices')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
            	<div class="content-header row">
		            <div class="content-header-left col-md-6 col-12 mb-2">
		                <div class="row breadcrumbs-top">
		                    <div class="breadcrumb-wrapper col-12">
		                        <ol class="breadcrumb">
		                            <li class="breadcrumb-item"><a href="">Accueil </a>
		                            </li>
		                            <li class="breadcrumb-item"><a href="{{route('admin.invoices')}}"> {{__('admin/invoices.all_invoices')}}  </a>
		                            </li>
		                            <li class="breadcrumb-item active">{{__('admin/navBar.paid_invoices')}}
		                            </li>
		                        </ol>
		                    </div>
		                </div>
		            </div>
		        </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"></h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.invoices.create')}}"
                            class="box-title btn btn-primary float-right">
                            <i class="fa fa-plus-circle"></i> {{__('admin/invoices.add_invoice')}}</a>
                        </div>
                    </div>

                    <div class="table-responsive" style="z-index: -1">
                <table id="example" class="table table-striped table-bordered display" style="width:100%;" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin/invoices.actions')}}</th>
                                    <th>{{__('admin/invoices.invoice_num')}}</th>
                                    <th>{{__('admin/invoices.invoice_date')}}</th>
                                    <th>{{__('admin/invoices.due_date')}}</th>
                                    <th>{{__('admin/invoices.product')}}</th>
                                    <th>{{__('admin/invoices.categories')}}</th>
                                    <th>{{__('admin/invoices.discount')}}</th>
                                    <th>{{__('admin/invoices.Rate_vat')}}</th>
                                    <th>{{__('admin/invoices.Value_VAT')}}</th>
                                    <th>{{__('admin/invoices.total')}}</th>                                    
                                    <th>{{__('admin/invoices.status')}}</th>
                                    <th>{{__('admin/invoices.note')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset($invoices)
                                @foreach($invoices as $key=>$invoice)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group margin-top-10">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('admin/invoices.actions')}} <span class="caret"></span>
                                                </button> 
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href=" {{ route('admin.invoices.edit',$invoice->uuid)}}"><i class="fa fa-edit"></i> {{__('admin/invoices.edit_invoice')}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" data-toggle="modal" data-uuid="{{$invoice->uuid}}" data-target="#delete_invoice" href="#"><i class="fa fa-trash"></i> {{__('admin/invoices.delete_invoice')}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.invoices.changeStatus',$invoice->uuid)}}"><i class="fa fa-money"></i> {{__('admin/invoices.changePayment_status')}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.invoices.show',$invoice->uuid)}}">
                                                {{$invoice->invoice_number}}
                                            </a>
                                        </td>
                                        <td>{{$invoice->invoice_date}}</td>
                                        <td>{{$invoice->due_date}}</td>
                                        <td>{{$invoice->products->product_name}}</td>
                                        <td>{{$invoice->category->name}}</td>
                                        <td>{{$invoice->discount}}</td>
                                        <td>{{$invoice->Rate_vat}}</td>
                                        <td>{{$invoice->Value_VAT}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>
                                            @if($invoice->value_status == 1)
                                                <span class="text-success">{{$invoice->status}}</span>
                                            @elseif($invoice->value_status == 2)
                                                <span class="text-danger">{{$invoice->status}}</span>
                                            @else
                                                <span class="text-warning">{{$invoice->status}}</span>
                                            @endif
                                        </td>
                                        <td>{{$invoice->note}}</td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>  
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1"
                                    onclick="history.back();">
                                <i class="ft-x"></i> {{__('admin/invoices.back')}}
                            </button>
                        </div>                          
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
@section('script')
    @include('admin.includes.modals.deleteInvoice')
<script type="text/javascript">
     $('#delete_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var uuid = button.data('uuid')
            var modal = $(this)
            modal.find('.modal-body #uuid').val(uuid);
        })
</script>
@endsection
