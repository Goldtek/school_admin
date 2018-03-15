@extends('layouts.master')

@section('title')
Featured Jobs
@endsection

@section('content')
<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Featured Jobs</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">Dashboard</a>
                                </li>
                                <li class="active">Featured Jobs</li>
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
                              <div class="panel">
                                <div class="dashboard-logo-sidebar">
                        <img class="img-responsive center-block" src={{URL::to(Auth::guard('admin')->user()->logo)}} >
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4>{{Auth::guard('admin')->user()->name}}</h4>
                                </div>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                    <li>
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
                                        <li class="active">
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
                            <div class="heading-inner first-heading">
                                <p class="title">Your Featured Jobs</p>
                            </div>
                            @if(Session::has('info'))
                                 <div class="alert alert-info alert-dismissible " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                       {{Session::get('info')}}
                                                        </div>
                                                        @endif
                            <div class="all-jobs-list-box2">
                                @foreach($jobs as $job)
                                <div class="job-box job-box-2 expire-box ribbon-content">
                                    <div class="job-title-box">
                                        <a href="#">
                                            <div class="job-title"> {{$job->title}}  </div>
                                        </a>
                                        <a href="#"><span class="comp-name"> {{$job->location}}  </span></a>
                                        <a href="" class="job-type jt-full-time-color">
                                            <i class="fa fa-clock-o"></i> {{$job->jobType}} 
                                        </a>
                                    </div>
                                    <div class="expire-job-box">
                                        <span class="expire-date"> This job will Expire on <strong>{{ date("F jS, Y", strtotime( $job->enddate))}} </strong></span>
                                        <span class="pull-right">
                                   		<!-- <a href="" class="btn btn-default"> Edit job</a> -->
                                    	<a href="{{route('delete_featured',['id'=>$job->id])}}" class="btn btn-danger"> Delete job</a>
                                   </span>
                                    </div>
                                    <div class="ribbon base"><span class="feature"> <i class="icon-trophy"></i>  Featured</span></div>
                                </div>
                                @endforeach
                                   </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <!-- links -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection