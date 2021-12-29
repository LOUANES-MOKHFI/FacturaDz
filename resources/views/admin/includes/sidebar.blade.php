<div class="main-menu">
	<header class="header">
		<a href="#" class="logo"><i class="ico mdi mdi-cube-outline"></i>FaturaDz</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="/admin/assets/images/avatar-sm-5.jpg" alt=""><span class="status online"></span></a>
			<h5 class="name" ><a href="#" style="font-size: 15px">{{Auth::user()->name}}</a></h5>
			<h5 class="position">Admin</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="#"><i class="fa fa-user"></i>{{__('admin/navBar.profile')}}</a></div>
					<div class="control-item"><a href=""><i class="fa fa-gear"></i> {{__('admin/navBar.settingsH')}}</a></div>
					<div class="control-item">
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>{{__('admin/navBar.logout')}}</a>
                    </div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="#"><i class="menu-icon mdi mdi-view-dashboard"></i><span>{{__('admin/navBar.dashboard')}}</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{route('admin.products')}}"><i class="menu-icon fa fa-check-square"></i><span>{{__('admin/navBar.products')}}</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-chart-areaspline"></i><span>{{__('admin/navBar.invoices')}}</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.invoices')}}">{{__('admin/navBar.invoices')}}</a></li>
						<li><a href="{{route('admin.invoices.Paid')}}">{{__('admin/navBar.paid_invoices')}}</a></li>
						<li><a href="{{route('admin.invoices.notPaid')}}">{{__('admin/navBar.not_paid_invoices')}}</a></li>
						<li><a href="{{route('admin.invoices.PartialyPaid')}}">{{__('admin/navBar.partialy_paid_invoices')}}</a></li>
						<li><a href="{{route('admin.invoices.archivedInvoice')}}">{{__('admin/navBar.archived_invoice')}}</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect" href="{{route('admin.settings')}}"><i class="menu-icon fa fa-check-square"></i><span>{{__('admin/navBar.settings')}}</span></a>
				</li>
                

			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
