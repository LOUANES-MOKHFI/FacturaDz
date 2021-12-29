@extends('admin.layouts.admin')
@section('title')
{{__('admin/products.all_products')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/products.all_products')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.products.create')}}"
                            class="box-title btn btn-primary float-right">
                            <i class="fa fa-plus-circle"></i> {{__('admin/products.add_product')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/products.name')}}</th>
                                    <th>{{__('admin/products.category')}}</th>
                                    <th>{{__('admin/products.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/products.name')}}</th>
                                    <th>{{__('admin/products.category')}}</th>
                                    <th>{{__('admin/products.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($products)
                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$product ->product_name}}</td>
                                        <td>{{$product ->category->name}}</td>
                                        <td>
                                            <a href="{{route('admin.products.edit',$product -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light" title="{{__('admin/products.edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.products.delete',$product -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light" title="{{__('admin/products.delete')}}">
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
