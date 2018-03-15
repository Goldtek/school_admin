@extends('layouts.master')
@section('title')
Job Details
@endsection

@section('content')

   <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>{{$job->title}}</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active"> @if(empty($freelance))job Details @else Freelance Job Details @endif </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="single-job-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="single-job-page-2 job-short-detail">
                                <div class="heading-inner">
                                    <p class="title">Job Description</p>
                                </div>
                                <div class="job-desc job-detail-boxes">
                                    <p>
    
                                        {!! html_entity_decode($job->jobDetails) !!}
                                      
                                    </p>
                                    <div class="heading-inner">
                                        <p class="title">Job Responsibilities:</p>
                                    </div>
                                   <p>
                                    
                                     {!! html_entity_decode($job->responsibility) !!}
                                    
                                    </p>
                                    @if($job->requirement!="")
                                    <div class="heading-inner">
                                        <p class="title">Job Requirements:</p>
                                    </div>
                                  <p>
                                    
                                     {!! html_entity_decode($job->requirement) !!}
                                    
                                    </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="widget">
                                <div class="widget-heading"><span class="title">Brief Description</span></div>
                                <ul class="short-decs-sidebar">
                                    @if(isset($job->name))
                                    <li>
                                        <div>
                                            <h4>Company:</h4></div>
                                        <div><i class="fa fa-building"></i>{{ucfirst($job->name)}} </div>
                                    </li> 
                                    @else
                                     <li>
                                        <div>
                                            <h4>Company:</h4></div>
                                        <div><i class="fa fa-building"></i>Freelance Job </div>
                                    </li>
                                    
                                    @endif
                                    <li>
                                        <div>
                                            <h4>Job Type:</h4></div>
                                        <div><i class="fa fa-bars"></i>{{ucfirst($job->jobType)}} </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Job Experience:</h4></div>
                                        <div><i class="fa fa-clock-o"></i>{{$job->jobExperience}} years</div>
                                    </li>
                                                                      

                                    <li>
                                        <div>
                                            <h4>Vacancy:</h4></div>
                                        <div><i class="fa fa-user"></i>{{$job->noVacany}}</div>
                                    </li>
                                    
                                    <li>
                                        <div>
                                            <h4>Posted On:</h4></div>
                                        <div><i class="fa fa-calendar"></i>{{date("d-M-Y",strtotime($job->created_at))}}</div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Deadline:</h4></div>
                                        <div><i class="fa fa-calendar"></i>{{date("d-M-Y",strtotime($job->enddate))}} </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Salary:</h4></div>
                                        <div>@foreach($salaries as $s)
                                                @if($s->id==$job->salary)
                                                {{$s->name}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </li> 
                                    <li>
                                        <div>
                                            <h4>Location:</h4></div>
                                        <div><i class="fa fa-map-marker"></i>{{$job->location}}
                                              
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <aside>
                                <div class="apply-job">
                                      @if(!isset($freelance))
                                    <a href="{{route('user.apply',['id'=>$job->id])}}" class="btn btn-default" ><i class="fa fa-upload"></i>Apply For Position</a>
                                    @else
                                     <a href="{{route('freelance.apply',['id'=>$job->id])}}" class="btn btn-default" ><i class="fa fa-upload"></i>Get Hired</a>
                                    @endif
                                    
                                    @if(!isset($freelance))
                                    <a id="bookmark" company="{{$job->company_id}}" class="btn btn-default bookmark"><i class="fa fa-star"></i> Bookmark Company</a>
                                    @endif
                                </div>
                                <div class="company-detail">
                                    
                                    
                                </div>
                            </aside>
                            <div class="single-job-map">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

@stop