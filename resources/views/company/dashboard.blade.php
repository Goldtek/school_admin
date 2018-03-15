@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')


        <section class="company-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="dashboard-header">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="dashboard-header-logo-box">
                                    <div class="company-logo">
                                        <img src={{URL::to(Auth::guard('admin')->user()->logo)}} alt="" class="img-responsive center-block " >
                                    </div>
                                    <h3>{{Auth::guard('admin')->user()->name}}</h3>
                                    <p>{{Auth::guard('admin')->user()->address}}</p>
                                    <ul class="social-links list-inline">
                                        <li> <a href="#"><i class="icon-facebook"></i></a></li>
                                        <li> <a href="#"><i class="icon-twitter"></i></a></li>
                                        <li> <a href="#"><i class="icon-googleplus"></i></a></li>
                                        <li> <a href="#"><i class="icon-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="rad-info-box">
                                    <i class="icon icon-profile-male"></i>
                                    <span class="title-dashboard">Followers</span>
                                    <span class="value"><span>{{$followers}}</span></span>
                                </div>
                                <div class="rad-info-box">
                                    <i class="icon icon-presentation"></i>
                                    <span class="title-dashboard">Jobs Posted</span>
                                    <span class="value"><span>{{$job_posted}}</span></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="rad-info-box">
                                    <i class="icon icon-documents"></i>
                                    <span class="title-dashboard">New resume</span>
                                    <span class="value"><span>{{$resumes}}</span></span>
                                </div>
                                <div class="rad-info-box rad-txt-success">
                                    <i class="icon icon-briefcase"></i>
                                    <span class="title-dashboard">Shortlisted</span>
                                    <span class="value"><span>{{$list}}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                         <li class="active">
                                            <a href="{{route('company.dashboard')}}"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.edit')}}"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.resume')}}"> <i class="fa fa-file-o"></i>Search Database </a>
                                        </li>
                                         <li>
                                            <a href="{{route('show_shortlist')}}"> <i class="fa fa-file-o"></i>View Shortlist </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.viewCv')}}"> <i class="fa fa-file-o"></i>Resumes </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.post')}}"> <i class="fa fa-pencil-square"></i>Post Job </a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.jobs')}}"> <i class="fa  fa-list-ul"></i> Active Jobs</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.featured')}}"> <i class="fa  fa-list-alt"></i> Featured Jobs</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.followers')}}"> <i class="fa  fa-bookmark-o"></i> Followers </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="job-short-detail">
                                
                                
                                      @if(Session::has('info'))
                                 <div class="alert alert-info alert-dismissible " role="alert" style="margin-left:3%">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                       {{Session::get('info')}}
                                                        </div>
                                                        @endif
                                
                                <div class="heading-inner">
                                    <p class="title">Profile detail</p>
                                </div>
                                <dl>
                                    <dt>Company Name:</dt>
                                    <dd> {{Auth::guard('admin')->user()->name}}</dd>
                                    
                                    <dt>Industry:</dt>
                                    <dd> 
                                        @foreach($industry as $i)
                                        @if($i->id==Auth::guard('admin')->user()->industry)
                                        {{$i->name}}
                                        @endif
                                            @endforeach
                                    
                                    </dd>

                                    <dt>Phone:</dt>
                                    <dd>{{Auth::guard('admin')->user()->phone}} </dd>

                                    <dt>Email:</dt>
                                    <dd>{{Auth::guard('admin')->user()->email}} </dd>

                                    <dt>No. of Employees:</dt>
                                    <dd>{{Auth::guard('admin')->user()->noEmployee}}</dd>

                                    <dt>Address:</dt>
                                    <dd>{{Auth::guard('admin')->user()->address}}</dd>

                                    <dt>City:</dt>
                                    <dd>{{Auth::guard('admin')->user()->city}}</dd>

                                    <dt>website:</dt>
                                    <dd>{{Auth::guard('admin')->user()->website}} </dd>

                                    <dt>Country:</dt>
                                    <dd>{{Auth::guard('admin')->user()->country}} </dd>
                                </dl>
                            </div>
                            <div class="heading-inner">
                                <p class="title"> About Your Company </p>
                            </div>
                            <p>
                            {{Auth::guard('admin')->user()->about}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection