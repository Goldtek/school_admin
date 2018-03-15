@extends('layouts.master')

@section('title')
View Resumes
@endsection

@section('content')
<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Shortlisted Candidates</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">Dashboard</a>
                                </li>
                                <li class="active">Shortlist</li>
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
                                         <li class="active">
                                            <a href="{{route('show_shortlist')}}"> <i class="fa fa-file-o"></i>View Shortlist </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.viewCv')}}"> <i class="fa fa-file-o"></i>Resumes </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.post')}}"> <i class="fa fa-pencil-square"></i>Post Job </a>
                                        </li>
                                        <li >
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
                            <div class="heading-inner first-heading">
                                <p class="title">Shortlisted Users </p>
                            </div>
                            <div class="resume-list">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                              
                                                <th>Applicant Name</th>
                                                <th>Resume</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($list as $l)
                                            <tr>
                                                
                                                <td>
                                            @foreach($users as $user)
                                                @if($l->user_id == $user->id)
                                              <h5>{{$user->sname}} {{$user->fname}}</h5>      
                                                    @endif
                                                @endforeach
                                                </td>
                                           
                                                                                                 
                                              
                                                <td>
                                                @foreach($users as $user)
                                                @if($l->user_id == $user->id)
                                           <a class="btn btn-primary" href="{{URL::to($user->cv)}}"> Download Cv </a>
                                                @endif
                                                @endforeach  
                                                </td>
                                                
                                                <td><a class="btn btn-danger" href="{{route('delete_user',['id'=>$l->id])}}"> Delete User </a></td>
                                                
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- resumes->links -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

@stop