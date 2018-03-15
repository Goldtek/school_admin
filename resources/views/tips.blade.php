@extends('layouts.master')
@section('title')
{{$feed->title}}
@endsection

@section('content')

   <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>{{$feed->title}}</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">News Feed  </li>
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-job-page-2 job-short-detail">
                                <div class="heading-inner">
                                    <p class="title">{{$feed->title}}</p>
                                </div>
                                <div class="job-desc job-detail-boxes">
                                    <p>
    
                                        {!! html_entity_decode($feed->desc) !!}
                                      
                                    </p>
                                   
                                 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

@stop