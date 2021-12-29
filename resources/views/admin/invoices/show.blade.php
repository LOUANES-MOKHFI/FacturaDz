@extends('admin.layouts.admin')

@section('title')
{{__('admin/invoices.invoice_information')}}
@endsection
@section('style')
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/form-wizard/prettify.css')}}">
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
                                <li class="breadcrumb-item active">{{__('admin/invoices.invoice_information')}}
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                       <div id="tabsleft" class="tabbable tabs-left">
											<ul>
												<li><a href="#tabsleft-tab1" data-toggle="tab">
												{{__('admin/invoices.invoice_information')}}</a></li>
												<li><a href="#tabsleft-tab2" data-toggle="tab">{{__('admin/invoices.payment_statuses')}}</a></li>
												<li><a href="#tabsleft-tab3" data-toggle="tab">{{__('admin/invoices.attachments')}}</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane" id="tabsleft-tab1">
													<table id="example" class="table table-striped table-bordered display" style="width:100%">
							                            <tbody>
							                                    <tr>
							                                        <th>{{__('admin/invoices.invoice_num')}}</th>
							                                        <td>
							                                            <a href="{{route('admin.invoices.edit',$invoice->uuid)}}">
							                                                {{$invoice->invoice_number}}
							                                            </a>
							                                        </td>
							                                        <th>{{__('admin/invoices.invoice_date')}}</th>
							                                        <td>{{$invoice->invoice_date}}</td>
							                                        <th>{{__('admin/invoices.due_date')}}</th>
							                                        <td>{{$invoice->due_date}}</td>
							                                        <th>{{__('admin/invoices.product')}}</th>
							                                        <td>{{$invoice->products->product_name}}</td>
							                                    </tr>
							                                    <tr>
							                                        <th>{{__('admin/invoices.categories')}}</th>
							                                        <td>{{$invoice->category->name}}</td>
							                                        <th>{{__('admin/invoices.discount')}}</th>
							                                        <td>{{$invoice->discount}}</td>
							                                        <th>{{__('admin/invoices.Rate_vat')}}</th>
							                                        <td>{{$invoice->Rate_vat}}</td>
							                                        <th>{{__('admin/invoices.Value_VAT')}}</th>
							                                        <td>{{$invoice->Value_VAT}}</td>
							                                    </tr>
							                                    <tr>
							                                        <th>{{__('admin/invoices.total')}}</th>
							                                        <td>{{$invoice->discount}}</td>
							                                        <th>{{__('admin/invoices.status')}}</th>
							                                        <td>
							                                            @if($invoice->value_status == 1)
							                                                <span class="btn btn-bordered btn-success">{{$invoice->status}}</span>
							                                            @elseif($invoice->value_status == 2)
							                                                <span class="btn btn-bordered btn-danger">{{$invoice->status}}</span>
							                                            @else
							                                                <span class="btn btn-bordered btn-warning">{{$invoice->status}}</span>
							                                            @endif
							                                        </td>
							                                        <th>{{__('admin/invoices.note')}}</th>
							                                        <td>{{$invoice->note}}</td>
							                                        
							                                    </tr>
							                                
							                            </tbody>
							                        </table>
												</div>
												<div class="tab-pane" id="tabsleft-tab2">
													<table id="example" class="table table-striped table-bordered display" style="width:100%">
														<thead>
															<th>#</th>
					                                        <th>{{__('admin/invoices.invoice_num')}}</th>
					                                        <th>{{__('admin/invoices.product')}}</th>
					                                        <th>{{__('admin/invoices.categories')}}</th>
					                                        <th>{{__('admin/invoices.status')}}</th>
					                                        <th>{{__('admin/invoices.due_date')}}</th>
					                                        <th>{{__('admin/invoices.invoice_date')}}</th>
							                                <th>{{__('admin/invoices.note')}}</th>
							                                <th>{{__('admin/invoices.user')}}</th>

														</thead>
							                            <tbody>
							                            	@isset($details)
							                            	@foreach($details as $key=>$detail)
						                                    <tr>
						                                    	<td>{{$key+1}}</td>
						                                        <td>{{$detail->invoice_number}}</td>
						                                        <td>{{$detail->products->product_name}}</td>
						                                        <td>{{$detail->categorys->name}}</td>
						                                        <td>
						                                            @if($detail->value_status == 1)
						                                                <span class="btn btn-bordered btn-success">{{$detail->status}}</span>
						                                            @elseif($detail->value_status == 2)
						                                                <span class="btn btn-bordered btn-danger">{{$detail->status}}</span>
						                                            @else
						                                                <span class="btn btn-bordered btn-warning">{{$detail->status}}</span>
						                                            @endif
						                                        </td>
						                                        <td>{{$invoice->due_date}}</td>
						                                        <td>{{$detail->created_at}}</td>
						                                        <td>{{$detail->note}}</td>
						                                        <td>{{$detail->user->name}}</td>
						                                    </tr>
						                                    @endforeach
						                                    @endisset
							                            </tbody>
							                        </table>
												</div>
												<div class="tab-pane" id="tabsleft-tab3">
													<div class="row container">
														<div class="card-body">
					                                        <form class="form" action="{{route('admin.invoices.file.store')}}" method="POST" 
					                                            enctype='multipart/form-data'>
					                                            @csrf
					                                            <input type="hidden" name="invoices_id" value="{{$invoice->id}}">
					                                            <input type="hidden" name="invoice_number" value="{{$invoice->invoice_number}}">
					                                            <div class="form-body">
					                                                
					                                                <div class="row">
					                                                    <div class="col-md-12">
					                                                        <div class="form-group">
					                                                            <span style="color: red;font-size: 13px">* {{__('admin/invoices.file')}} pdf,jpeg,jpg,png</span> <br>
					                                                            <label for="projectinput1">{{__('admin/invoices.attachments')}}</label>
					                                                            <input type="file" id="" class="form-control" name="file_name" accept=".pdf,.jpg, .png, image/jpeg, image/png" />
					                                                            @error("attachments")
					                                                            <span class="text-danger"> {{$message}}  </span>
					                                                            @enderror
					                                                        </div>
					                                                    </div>
					                                                </div>
					                                            </div>

					                                            <div class="form-actions">
					                                                <button type="submit" class="btn btn-primary">
					                                                    <i class="la la-check-square-o"></i> {{__('admin/invoices.save')}}
					                                                </button>
					                                            </div>
					                                        </form>
				                                    	</div>
													</div>
													<br>
													<table id="example" class="table table-striped table-bordered display" style="width:100%">
														<thead>
															<tr>
																<td>#</td>
																<th>{{__('admin/invoices.attachments')}}</th>
																<th>{{__('admin/invoices.invoice_num')}}</th>
																<th>{{__('admin/invoices.user')}}</th>
																<th>{{__('admin/invoices.invoice_date')}}</th>
																<th>{{__('admin/invoices.actions')}}</th>
															</tr>
														</thead>
							                            <tbody>
							                            	@isset($attachements)
								                            	@foreach($attachements as $key => $attachement)
							                                    <tr>
							                                    	<td>1</td>
							                                    	<td>{{$attachement->file_name}}</td>
							                                        <td>{{$attachement->invoice_number}}</td>
							                                        <td>{{$attachement->user->name}}</td>
							                                        <td>{{$attachement->created_at}}</td>
							                                        <td>
										                                <a href="{{route('admin.invoices.file.open',[$attachement->invoice_number,$attachement->file_name])}}" target="_blank" class="btn btn-bordered btn-primary waves-effect waves-light" title="{{__('admin/invoices.edit')}}">
										                                    <i class="fa fa-eye"></i>
										                                </a>
										                                <a href="{{route('admin.invoices.file.download',[$attachement->invoice_number,$attachement->file_name])}}" class="btn btn-bordered btn-success waves-effect waves-light" title="{{__('admin/invoices.edit')}}">
										                                    <i class="fa fa-download"></i>
										                                </a>
										                                <button class="btn btn-bordered btn-danger waves-effect waves-light" data-toggle="modal" 
										                                data-file_name="{{$attachement->file_name}}"
										                                data-invoice_number="{{$attachement->invoice_number}}"
										                                data-file_id="{{$attachement->id}}"
										                                data-target="#delete_file">
										                                	<i class="fa fa-trash"></i>
										                                </button>
									                            	</td>
							                                    </tr>
							                                    @endforeach
						                                    @endisset
							                            </tbody>
							                        </table>
													
												</div>
											</div>
										</div>
										<div class="form-actions">
				                            <button type="button" class="btn btn-warning mr-1"
				                                    onclick="history.back();">
				                                <i class="ft-x"></i> {{__('admin/invoices.back')}}
				                            </button>
				                        </div>    
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
@include('admin.includes.modals.deleteFile')
	<script src="{{asset('admin/assets/plugin/form-wizard/prettify.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/form.wizard.init.min.js')}}"></script>
<script type="text/javascript">
   
</script>
<script type="text/javascript">
     $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var file_id = button.data('file_id')
            var modal = $(this)
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
            modal.find('.modal-body #file_id').val(file_id);
        })
</script>
@endsection
