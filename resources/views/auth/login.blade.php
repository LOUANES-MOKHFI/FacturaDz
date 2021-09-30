@extends('admin.layouts.login')

@section('content')
<form action="{{route('login')}}" method="post" class="frm-single">
    @csrf
        <div class="inside">
            <div class="title"><strong>MaghAssistance</strong>Admin</div>
            <!-- /.title -->
            <div class="frm-title">Se Connecter</div>
            <!-- /.frm-title -->
            <div class="frm-input">
            @include('admin.includes.alerts.alerts')
            </div>

            <div class="frm-input">

                <input name="email" value="{{old('email')}}" type="email" placeholder="Email" class="frm-inp"><i class="fa fa-user frm-ico"></i>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- /.frm-input -->
            <div class="frm-input"><input name="password"  type="password" placeholder="Mot de passe" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- /.frm-input -->
            
            <div class="clearfix margin-bottom-20">
                <div class="pull-left">
                    <div class="checkbox primary"><input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label for="rememberme">Se souvenir de moi</label></div>
                    <!-- /.checkbox -->
                </div>
                <!-- /.pull-left -->
                <div class="pull-right">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Mot de passe oubliée</a>
                    @endif
                </div>
                <!-- /.pull-right -->
            </div>
            <!-- /.clearfix -->
            <button type="submit" class="frm-submit">Se Connecter<i class="fa fa-arrow-circle-right"></i></button>
            
            <div class="frm-footer">FaturaDz © 2021.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>

@endsection
