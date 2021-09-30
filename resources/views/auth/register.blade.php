@extends('admin.layouts.login')

@section('content')
<form action="{{route('register')}}" method="post" class="frm-single">
    @csrf
        <div class="inside">
            <div class="title"><strong>FaturaDz</strong>Admin</div>
            <!-- /.title -->
            <div class="frm-title">Se Connecter</div>
            <!-- /.frm-title -->
            <div class="frm-input">
            @include('admin.includes.alerts.alerts')
            </div>

            <div class="frm-input">

                <input name="name" value="{{old('name')}}" type="text" placeholder="Nom et prénom" class="frm-inp"><i class="fa fa-user frm-ico"></i>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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
            <div class="frm-input">
                <input id="password-confirm" placeholder="Confirmer le Mot de passe" type="password" class="frm-inp" name="password_confirmation" required autocomplete="new-password"><i class="fa fa-lock frm-ico"></i>
            </div>
            <!-- /.frm-input -->
            <button type="submit" class="frm-submit">S'inscrire<i class="fa fa-arrow-circle-right"></i></button>
             <div class="clearfix margin-bottom-20">
                <!-- /.pull-left -->
                <div class="pull-left">
                   
                        Vous avez un compte ? <a href="{{ route('login') }}" class="a-link"><i class=""></i>Se connecter</a>
                    
                </div>
                <!-- /.pull-right -->
            </div>
            <!-- /.clearfix -->
            <div class="frm-footer">FaturaDz © 2021.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>

@endsection
