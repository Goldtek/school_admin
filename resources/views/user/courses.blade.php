@extends('layouts.master')
@section('title')
Courses
@endsection

@section('content')

<section class="dashboard parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="dashboard-header">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="user-avatar ">
                                    
                                    <h3>{{Auth::user()->Fullname()}}</h3>
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
                        <div class="col-md-12">
                        @if(!is_null($courses))       
                          <h2> click on any course to access the class</h2>
                          @else
                            @if(Auth::user()->type=='student')
                            <h2> No Course has been assigned to this department and level </h2>
                            @else
                            <h2> No Course has been assigned to you </h2>
                            @endif
                          @endif
                        </div>
                        @foreach($courses as $course)
                                <a href="{{route('user.dashboard',['class_id'=>$course->class_id,'course_id'=>$course->course_id])}}">
                                <div class="col-md-3 well" style="height:auto, min-height:250px; cursor:pointer">
                                    {{$course->name}}
                                </div>
                            </a>
                        @endforeach
                    </div>    
                </div>
            </div>
        </section>
     @endsection
           