@extends('layouts.master')

@section('title')
Employer Registration
@endsection

@section('content')

<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3> Employer Registration Page</h3>
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
                        
                 <div class="col-md-9 col-md-offset-2" style="background-color: #fff; padding: 5px; border: 5px solid #FFF; margin-top:0">
                     <form action="{{route('auth.employer.register')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                     <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Firstname: <span class="required">*</span></label>
                                    <input placeholder="Enter Firstname" class="form-control" name="fname" type="text" required>
                                </div> 
                               
                                <div class="form-group">
                                    <label>Phone: <span class="required">*</span></label>
                                    <input placeholder="Enter Phone Number" class="form-control" type="text" required name="phone">
                                </div>
                                
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="Enter Password" class="form-control" type="password" name="password" required>
                                </div>
                                
                               
                      
                            </div>
                     
                     <div class="col-md-6">
                      <div class="form-group">
                                    <label>Surname: <span class="required">*</span></label>
                                    <input placeholder="Enter Surname" class="form-control" type="text" required name="sname">
                                </div>
                     <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="Enter Email Address" class="form-control" type="email" name="email" required>
                                </div>
                         
                         <div class="form-group">
                                    <label>Confirm Password: <span class="required">*</span></label>
                                    <input placeholder="Confirm Password" class="form-control" type="password" name="cpassword" required>
                                </div>
                 
                     
                     </div>
                        </div>
                     
                     <div class="row">
                     <div class="col-md-12"> <h3> Company Details</h3> <hr style="width:100%;"> </div>
                     </div>
                     
                     <div class="row">
                     <div class="col-md-6">
                          <div class="form-group">
                                    <label>Company Name: <span class="required">*</span></label>
                                    <input placeholder="Enter Company Name" class="form-control" type="text" required name="name">
                                </div>
                         
                         
                           <div class="form-group">
                                            <label class="control-label">Company Logo: <span class="required">*</span></label>
                                             <div class="input-group image-preview form-group">
                                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="file_extension" name="logo" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                         
                         
                          <div class="loginbox-forgot">
                                    <input type="checkbox"> I accept <a href="">Term and conditions?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <input type="submit" class="btn btn-default btn-block" value="Register">
                                </div>
                         
                         </div>
                         
                     <div class="col-md-6">
                         
                         <div class="form-group">
                                    <label>Website: <span class="required">*</span></label>
                                    <input placeholder="Enter Website" class="form-control" type="url" required name="website">
                                </div>
                            <div class="form-group">
                                        <div class="form-group">
                                            <label>Industry: <span class="required">*</span></label>
                                           <select name="industry" required class="form-control">
                                            <option value="" >Select Industry</option>
                                            <option value="1">Banking / Financial Services</option>
                                            <option value="2">Healthcare / Nutrition</option>
                                            <option value="3">ICT / Telecommunications </option>
                                            <option value="4">Oil &amp; Gas / Mining </option>
                                            <option value="5">FMCG / Conglomerate</option>
                                            <option value="6">Government Agencies</option>
                                            <option value="7">Food Services &amp; Beverages</option>
                                            <option value="8">Hospitality / Leisure</option>
                                            <option value="9">NGO / International Agencies </option>
                                            <option value="10">Legal/ Law</option>
                                            <option value="11">Logistics / Transportation </option>
                                            <option value="12">Construction / Real Estate</option>
                                            <option value="13">Engineering / Maritime</option>
                                            <option value="14">Agriculture</option>
                                            <option value="15">Consulting</option>
                                            <option value="16">Advertising / Media</option>
                                            <option value="17">Education Services / Research</option>
                                            <option value="18">Manufacturing / Production</option>
                                            <option value="19">Ecommerce / Retail / Wholesales</option>
                                            <option value="20">Trade / Services</option>
                                            <option value="21">Security Agencies</option>
                                            <option value="22">Beverages / Drinks</option>
                                            <option value="23">Art / Design</option>
                                            <option value="24">Fashion / Clothings</option>
                                            <option value="25">Energy / Power </option>
                                            <option value="26">Automotive / Car Services</option>
                                            <option value="27">Gaming / Sports</option>
                                            <option value="28">Staffing &amp; Employment Agencies</option>
                                            <option value="29">Others</option>
                                            </select>
                                        </div>
                                    </div>
                         
                              @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                         
                         <div class="loginbox-signup"> Already have account <a href="{{route('auth.user.login')}}">Sign in</a> </div>
                         
                         </div>
                     {{csrf_field()}}
                     </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
		

@endsection