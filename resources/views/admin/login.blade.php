@extends('layouts.master')

@section('title')
Admin Login
@endsection

@section('content')


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Login Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">Admin login</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="login-page light-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        
                           @if(Session::has('info'))
                                             <div class="alert alert-success alert-dismissible" role="alert" onload="run()">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                        {{Session::get('info')}}
                                                        </div>
                                                        @endif   
                                 @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                        
                        <div class="login-container">
                            <div class="loginbox">
                                <div class="loginbox-title">sign into your account</div>
                              
                                <form action="{{route('admin.login')}}" method="post">
                                <div class="form-group">
                                    <label>Username: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="Password" class="form-control" type="password" name="password">
                                </div>
                                <div class="loginbox-forgot">
                                    <a href="">Forgot Password?</a>
                                </div>
                                     <div class="loginbox-forgot">
                                    <input type="checkbox" name="remember"> Remember Me
                                </div>
                                <div class="loginbox-submit">
                                    <input type="submit" class="btn btn-default btn-block" value="Login">
                                </div>
                                    
                                <div class="loginbox-signup">
                                    <a href="{{route('admin.register')}}">Sign Up With Email</a>
                                </div>
                                    {{csrf_field()}}
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      

@endsection