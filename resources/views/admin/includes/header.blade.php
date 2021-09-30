
<style>

.notifications .fa {
    color:#cecece;
    line-height:60px;
    font-size:22px;
}
.notifications .num {
    position:absolute;
    top:10px;
    right:-10px;
    width:20px;
    height:20px;
    border-radius:50%;
    background:#ff2c74;
    color:#fff;
    line-height:25px;
    font-family:sans-serif;
    text-align:center;
}

</style>
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">{{__('admin/header.home')}}</h1>
		<a href="#" class="ico-item mdi" onclick="dark()" ><i class="fa fa-moon-o" aria-hidden="true"></i></a>
		<a href="#" class="ico-item mdi" onclick="light()"><i class="fa fa-sun-o" aria-hidden="true"></i></a>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">


        <a href="#" data-target="#lang" class="ico-item mdi js__toggle_open"><i class="fa fa-language" aria-hidden="true"></i> {{App::getLocale()}}</a>
        
		<a href="" class="ico-item notifications ico-item-notif">
        <i class="fa fa-bell notice-alarm " ></i>
        <span class="num notif_user" data-count="3">3</span></a>

        </audio>
        <a href="#" class="ico-item mdi mdi-logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->
 <div id="lang" class="notice-popup" >

    <ul class="notice-list">
         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li >
            <a style="height: 50px" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
            </a>
        </li>
          @endforeach
    </ul>

</div>

