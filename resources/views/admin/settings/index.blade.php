@extends('admin.layouts.admin')

@section('title')
Paramètres générals
@endsection

@section('style')

@endsection


@section('content')


		<!-- /.row -->

		<div class="row small-spacing">

			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
                    <a href="{{route('admin.settings.categories')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-heartbeat"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/navBar.categories')}}</p>
                            <h2 class="counter">{{$categories->count()}}</h2>
                        </div>
                    </a>
				</div>
				<!-- /.box-content -->
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
                    <a href="" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-briefcase"></i>
                            <p class="text text-white" style="font-size:18px">{{__('admin/navBar.prestations')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
                    <a href="" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-ambulance"></i>
                            <p class="text text-white" style="font-size:18px">{{__('admin/navBar.vehicules')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>
            <div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
                    <a href="" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-copyright"></i>
                            <p class="text text-white" style="font-size:18px">{{__('admin/navBar.categories')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>
            
		</div>
		<!-- .row -->


@endsection


@section('script')

@endsection
