@extends('layouts.master')

@section('title')
Followers
@endsection

@section('content')

<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Company Followers</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">Dashboard</a>
                                </li>
                                <li class="active">Followers</li>
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
                                            <a href="{{route('company.viewCv')}}"> <i class="fa fa-file-o"></i>Resumes </a>
                                        </li>
                                         <li>
                                            <a href="{{route('show_shortlist')}}"> <i class="fa fa-file-o"></i>View Shortlist </a>
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
                                        <li class="active">
                                            <a href="{{route('company.followers')}}"> <i class="fa  fa-bookmark-o"></i> Followers </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="heading-inner first-heading">
                                <p class="title">Edit Profile</p>
                            </div>
                            <div class="follower-section">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div  id="followers">
                                        <ul class="list-group list-group-dividered list-group-full">
                                            @foreach($users as $user)
                                            <li class="list-group-item col-md-6">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                                            <img src={{URL::to($user->image)}} class="img-responsive" alt="">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-default btn-sm">Hire</button>
                                                        </div>
                                                        <div><a class="name" href="javascript:void(0)">{{$user->sname}} {{$user->fname}}</a></div>
                                                        <small>{{$user->job}}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                           
                            </div>
 {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection