@extends('admin.layouts.admin')

@section('title')
{{__('admin/products.edit_product')}}
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
                                <li class="breadcrumb-item"><a href="{{route('admin.products')}}"> {{__('admin/products.all_products')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/products.edit_product')}}
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
                                    <h4 class="card-title" id="basic-layout-form">  {{__('admin/products.edit_product')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.products.update',$product->uuid)}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/products.name')}}</label>
                                                            <input type="text" value="{{$product->product_name}}" id="name"
                                                                   class="form-control" placeholder="  " name="product_name">
                                                            @error("product_name")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/products.category')}}</label>
                                                            <select class="form-control" name="category_id" required>
                                                                <option>{{__('admin/products.chose_categories')}}</option>
                                                                @isset($categories)
                                                                    @foreach($categories as $key=>$category)
                                                                        <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                            @error("category_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/products.description')}}</label>
                                                             <textarea type="text" id="name" class="form-control" placeholder=" " name="description">
                                                                   {{$product->description}}
                                                            </textarea>
                                                            @error("description")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                               
                                            </div>

                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/products.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/products.save')}}
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
