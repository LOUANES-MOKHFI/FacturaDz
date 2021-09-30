@extends('admin.layouts.admin')
@section('title')
{{__('admin/invoices.all_invoices')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/invoices.all_invoices')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.invoices.create')}}"
                            class="box-title btn btn-primary float-right">
                            <i class="fa fa-plus-circle"></i> {{__('admin/invoices.add_invoice')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/invoices.type')}}</th>
                                    <th>{{__('admin/invoices.matricule')}}</th>
                                    <th>{{__('admin/invoices.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/invoices.type')}}</th>
                                    <th>{{__('admin/invoices.matricule')}}</th>
                                    <th>{{__('admin/invoices.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($invoices)
                                @foreach($invoices as $key=>$invoice)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$invoice -> type}}</td>
                                        <td>{{$invoice -> matricule}}</td>
                                        <td>
                                            <a href="{{route('admin.invoices.edit',$invoice -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light" title="{{__('admin/invoices.edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.invoices.delete',$invoice -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light" title="{{__('admin/invoices.delete')}}">
                                                <i class="fa fa-trash"></i>
                                            </a>



                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
