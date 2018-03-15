@extends('layouts.master')

@section('title')
User Registration
@endsection

@section('content')

<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3> Registration Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">Registration</li>
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
                          
                            <div class="loginbox">
                                  <form action="{{route('auth.user.register')}}" method="post">
                                <div class="form-group">
                                    <label>Firstname: <span class="required">*</span></label>
                                    <input placeholder="Enter Firstname" class="form-control" name="fname" type="text" required>
                                </div> 
                                <div class="form-group">
                                    <label>Surname: <span class="required">*</span></label>
                                    <input placeholder="Enter Surname" class="form-control" type="text" required name="sname">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="female">Female</option>
                                    <option value="female">Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Phone: <span class="required">*</span></label>
                                    <input placeholder="Enter Phone Number" class="form-control" type="text" required name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="Enter Email Address" class="form-control" type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="Enter Password" class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password: <span class="required">*</span></label>
                                    <input placeholder="Confirm Password" class="form-control" type="password" name="cpassword" required>
                                </div>
                                <div class="loginbox-forgot">
                                    <input type="checkbox"> I accept <a href="">Term and conditions?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <input type="submit" class="btn btn-default btn-block" value="Register">
                                </div>
                                {{csrf_field()}}
                            </form>
                      <div class="loginbox-signup"> Already have account <a href="{{route('auth.user.login')}}">Sign in</a> </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
		

@endsection