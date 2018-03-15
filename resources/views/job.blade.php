@extends('layouts.master')

@section('title')
Search For Jobs
@endsection

@section('content')
 <section class="breadcrumb-search parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 nopadding">
                            <div class="search-form-contaner">
                                <form class="form-inline">
                                    <div class="col-md-7 col-sm-7 col-xs-12 nopadding">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search Keyword" value="">
                                            <i class="icon-magnifying-glass"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                        <div class="form-group">
                                            <select class="select-category form-control" id="category" name="category">
                                                <option value="Banking / Financial Services">Banking / Financial Services</option>
                                            <option value="Healthcare / Nutrition">Healthcare / Nutrition</option>
                                            <option value="ICT / Telecommunications">ICT / Telecommunications </option>
                                            <option value="Oil Gas / Mining">Oil &amp; Gas / Mining </option>
                                            <option value="FMCG / Conglomerate">FMCG / Conglomerate</option>
                                            <option value="Government Agencies">Government Agencies</option>
                                            <option value="Food Services Beverages">Food Services &amp; Beverages</option>
                                            <option value="Hospitality / Leisure">Hospitality / Leisure</option>
                                            <option value="NGO / International Agencies">NGO / International Agencies </option>
                                            <option value="Legal/ Law">Legal/ Law</option>
                                            <option value="Logistics / Transportation">Logistics / Transportation </option>
                                            <option value="Construction / Real Estate">Construction / Real Estate</option>
                                            <option value="Engineering / Maritime">Engineering / Maritime</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Consulting">Consulting</option>
                                            <option value="Advertising / Media">Advertising / Media</option>
                                            <option value="Education Services / Research">Education Services / Research</option>
                                            <option value="Manufacturing / Production">Manufacturing / Production</option>
                                            <option value="Ecommerce / Retail / Wholesales">Ecommerce / Retail / Wholesales</option>
                                            <option value="Trade / Services">Trade / Services</option>
                                            <option value="Security Agencies">Security Agencies</option>
                                            <option value="Beverages / Drinks">Beverages / Drinks</option>
                                            <option value="Art / Design">Art / Design</option>
                                            <option value="Fashion / Clothings">Fashion / Clothings</option>
                                            <option value="Energy / Power">Energy / Power </option>
                                            <option value="Automotive / Car Services">Automotive / Car Services</option>
                                            <option value="Gaming / Sports">Gaming / Sports</option>
                                            <option value="Staffing Employment Agencies">Staffing &amp; Employment Agencies</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <div class="form-group form-action">
                                            <button type="button" class="btn btn-default btn-search-submit" id="job_button">Search <i class="fa fa-angle-right"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <h4 class="search-result-text" id="infolink" > @if(isset($jobs)) Showing {{$jobs->count()}} of {{$jobs->total()}} available job(s) @else There is no record for your Search Criteria @endif </h4>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12" id="drop_display">
                            <div class="all-jobs-list-box">
                               @foreach($jobs as $job)
                                <div class="job-box job-box-2">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-sm hidden-xs">
                                        <div class="comp-logo">
                                            
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-sm-10 col-xs-12">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> {{$job->title}}</div>
                                            </a>
                                            <a href="#"><span class="comp-name"> {{$job->location}} </span></a>
                                            <a href="" class="job-type jt-full-time-color">
                                                <i class="fa fa-clock-o"></i> {{$job->title}}
                                            </a>
                                        </div>
                                        <p>{!! str_limit(html_entity_decode($job->jobDetails),250)!!}<a href="{{route('user.jobdetail',['id'=>$job->id])}}" class="btn btn-primary pull-right fa fa-briefcase" style="color:#fff">  Apply Now </a> </p>
                                    </div>
                                    <div class="job-salary">
                                        <i class="fa fa-money"></i> 
                                        @foreach($salaries as $salary)
                                        @if($job->salary == $salary->id)
                                        {{$salary->name}}
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                              
                               @endforeach 
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                
                                    {{ $jobs->links()}}
                             
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                          @include('partials.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>

@stop