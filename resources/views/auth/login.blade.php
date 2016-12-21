@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
<div class="login-form espacioPagina">
     <h1>Login</h1>
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
       {{ csrf_field() }}
       <div class="form-group">
         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email..."required autofocus autocomplete="off">
         <i class="fa fa-user"></i>
       </div>
       <div class="form-group log-status">
         <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña..." required>
         <i class="fa fa-lock"></i>
       </div>
       @if ($errors->has('email') or $errors->has('password'))
          <span class="alert"><strong>Invalid Credentials</strong></span>
       @endif
       <div class="form-group">
         <label style="color:darkgrey;">
             <input type="checkbox" name="remember"> Remember Me
         </label>
       </div>
        <!--<a class="link" href="#">Lost your password?</a>-->
       <button type="submit" class="log-btn" >Login</button>
     </form>
</div>
@endsection
