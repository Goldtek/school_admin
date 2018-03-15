@extends('layouts.master')
@section('title')
Resume
@endsection

@section('content')

   <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit profile</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">edit profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-card">
                                <div class="banner">
                                    <img src={{URL::to("images/polygons-1.png")}} alt="" class="img-responsive">
                                </div>
                                <div class="user-image">
                                    <img src={{URL::to(Auth::user()->image)}} class="img-responsive img-circle" alt="">
                                </div>
                                <div class="card-body">
                                    <h3>{{Auth::user()->Fullname()}}  </h3>
                                    <span class="title">{{strtoupper(Auth::user()->job)}}</span>
                                </div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="{{Auth::user()->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{Auth::user()->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{Auth::user()->google}}" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="{{Auth::user()->linkin}}" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="{{route('user.dashboard')}}"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.edit_profile')}}"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.build_resume')}}"> <i class="fa fa-file-o"></i>Build Resume </a>
                                        </li>
                                        <li  class="active">
                                            <a href="{{route('user.resume')}}"> <i class="fa fa-file-o"></i>Saved Resume </a>
                                        </li>
                                         <li>
                                            <a href="{{route('user.post')}}"> <i class="fa fa-file-o"></i>Post Freelance Job </a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.jobs')}}"> <i class="fa  fa-list-ul"></i> Jobs Applied</a>
                                        </li>
                                        
                                         <li>
                                            <a href="{{route('freelancer.viewCv')}}"> <i class="fa  fa-user"></i> View Freelancers Resume </a>
                                        </li> 
                                        <li>
                                            <a href="{{route('user.company')}}"> <i class="fa  fa-bookmark-o"></i> Followed Companies </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="col-md-12 uploadresume" style="display:none; border:1px dashed #ddd; margin-bottom:5px;">
                                <form action="{{route('user.uploadResume')}}" method="post" enctype="multipart/form-data" id="resumeform">
                                    {{csrf_field()}}
                                <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <label class="control-label">Resume Title</label>
                                <input type="text" placeholder="Resume Title" name="title" class="form-control">    
                                </div>
                                    
                                     <div class="col-md-4 col-sm-12">
                                         <label class="control-label">Select Resume</label>
                                        <div class="input-group image-preview form-group">
                                          <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="resume" accept="file_extension" name="input-file-preview" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label class="control-label" style="color:#fff">  coming home </label>
                                        <button type="submit" class="btn btn-primary fa fa-upload"> Upload Resume </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="heading-inner first-heading">
                                <p class="title">My Resume</p>
                                <a href="javascript:void(0)"><span class="pull-right add-button btn-default fa fa-plus" id="btnresume" data-toggle="modal" data-target=".add-resume-modal"> Add New Resume</span></a>
                            </div>
                            <div class="resume-list">
                            	<div class="table-responsive">
                                    <table class="table  table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Sr. #</th>
                                                <th>Resume Title</th>
                                                <th>Download</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resumes as $r)
                                            <tr>
                                                <th scope="row">{{$r->id}}</th>
                                                <td>
                                                    <h5>{{$r->title}}</h5></td>
                                                <td><a class="btn btn-primary" href="{{URL::to($r->resume)}}"> Download </a></td>
                                                <td><a class="btn btn-danger" href="{{route('deletemyRes',['id'=>$r->id])}}"> Delete </a></td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
                  <!--- modal upoad resume-->
                      
                     


@endsection