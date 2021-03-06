@extends('admin.layouts.admin')
@section('title')
{{__('admin/categories.all_categories')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/categories.all_categories')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.settings.categories.create')}}"
                            class="box-title btn btn-primary float-right">
                            <i class="fa fa-plus-circle"></i> {{__('admin/categories.add_categorie')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/categories.name')}}</th>
                                    <th>{{__('admin/categories.description')}}</th>
                                    <th>{{__('admin/categories.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/categories.name')}}</th>
                                    <th>{{__('admin/categories.description')}}</th>
                                    <th>{{__('admin/categories.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($categories)
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category -> name}}</td>
                                        <td>{{$category -> description}}</td>
                                        <td>
                                            <a href="{{route('admin.settings.categories.edit',$category -> id)}}" class="btn btn-bordered btn-warning waves-effect waves-light" title="{{__('admin/categories.edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.settings.categories.delete',$category -> id)}}" class="btn btn-bordered btn-danger waves-effect waves-light" title="{{__('admin/categories.delete')}}">
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
