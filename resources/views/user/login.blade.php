@extends('layouts.master')

@section('title')
User Login
@endsection

@section('content')


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3> Student/Lecturer Login Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">login</li>
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
                        <div class="login-container">
                            <div class="loginbox">
                                <div class="loginbox-title">sign into your account</div>
                              
                                <form action="{{route('auth.user.login')}}" method="post">
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email" name="email">
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
                                    <a href="{{route('auth.user.register')}}">Sign Up With Email</a>
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