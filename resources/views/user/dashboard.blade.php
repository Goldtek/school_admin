@extends('layouts.master')
@section('title')
User Dashboard
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
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                       
                                      
                                        <li class="active">
                                            <a href="{{route('courses')}}"> <i class="fa  fa-list-ul"></i> My Courses</a>
                                        </li>
                                        @if(Auth::user()->type=='student')
                                         <li>
                                            <a href=""> <i class="fa  fa-bookmark"></i> My Grades </a>
                                        </li> 
                                        @endif
                                        <li>
                                            <a href="{{route('auth.user.logout')}}"> <i class="fa  fa-power-off"></i> Logout </a>
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
                                    <p class="title" >  {{ $course->name}}  </p> 
                                    
                                </div>
                                <dl>
            
                                        <dt>Department:</dt>
                                        <dd> {{$course_details->department}}</dd>

                                        <dt>Level:</dt>
                                        <dd> {{$course_details->level}} </dd>

                                        <dt>Course:</dt>
                                        <dd> {{ $course->name}} </dd>

                                    
                                </dl>
                            </div>

                             
                            <p style="margin-top:5%">
                        <div class="panel panel-default panel-table">
                           
            <div class="panel-heading" style="font-size:20; font-weight:bold">
            <i class="fa fa-industry fa-lg"></i> Course Materials<div class="pull-right">
            @if(Auth::user()->type=='ta')
                <a href="javascript:;" 
                data-tooltip="true" data-toggle="modal" data-placement="top" 
                title="Add course material for this course" data-target=".material">
                <i class="fa fa-plus"></i> Add Course Material</a>
              @endif
              </div> </div>
            <div class="card-block p-0">
                <table class="table table-bordered table-sm m-0">
                    <thead class="">
                        <tr>
                            <th>Name of Material</th>
                            <th>Date Uploaded</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($materials as $material)
                            <tr>
                            <td> {{ $material->filename }} </td>
                            <td> {{$material->created_at}} </td>
                            <td> <a class="btn btn-primary btn-sm" href="{{URL::to($material->path)}}">Download</a></td>
                            </tr>
                    @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
           
        </div>
                </p>
                    
                <p style="margin-top:5%">
                    <div class="panel panel-default panel-table">
                           
                        <div class="panel-heading" style="font-size:20; font-weight:bold"><i class="fa fa-pencil fa-lg"></i> Assingments
                         <div class="pull-right">
                         @if(Auth::user()->type=='ta')
                            <a href="javascript:;"  data-tooltip="true"
                            data-toggle="modal" data-placement="top" title="Upload Questions" data-target=".questions">
                            <i class="fa fa-plus"></i> Add More Assignments</a>
                          @endif
                          </div></div>
                            <div class="card-block p-0">
                                <table class="table table-bordered table-sm m-0">
                                    <thead class="">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date Uploaded</th>
                                            <th>Last Date Of Submission</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($assignments as $as)
                            <tr>
                            <td> {{ $as->filename }} </td>
                            <td> {{$as->created_at}} </td>
                            <td> {{$as->submissionDate}} </td>
                            <td> <a class="btn btn-primary btn-sm" href="{{URL::to($as->path)}}">Download</a>
                            @if(Auth::user()->type=='student')
                                <a class="btn btn-info btn-sm" href="javascript:;"  data-tooltip="true"
                                data-toggle="modal" data-placement="top" title="Upload Answer" data-target=".answers">
                                Upload Answer</a>
                            @endif
                            </td>
                            </tr>
                    @endforeach
                                        
                                    
                                    </tbody>
                                </table>
                        </div>
                
                    </div>
                </p>

                @if(Auth::user()->type=='ta')
                    <p style="margin-top:5%">
                        <div class="panel panel-default panel-table">
                            
                            <div class="panel-heading" style="font-size:20; font-weight:bold"><i class="fa fa-graduation-cap fa-lg"></i>
                            Assignment Solutions 
                            </div>

                                <div class="card-block p-0">
                                    <table class="table table-bordered table-sm m-0">
                                        <thead class="">
                                            <tr>
                                            
                                                <th>Name of Student</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($answers as $answer)
                            <tr>
                            <?php $user = DB::table('users')->where('id',$answer->user_id)->first();
                            $name = $user->fname." ".$user->sname; ?>
                            <td> {{ $name }} </td>
                            <td> <a class="btn btn-primary btn-sm" href="{{URL::to($answer->path)}}">Download</a></td>
                            </tr>
                    @endforeach
                                        
                                        </tbody>
                                    </table>
                            </div>
                    
                        </div>
                    </p>
                @endif

                 
                    
                       
                    </div>
                </div>
            </div>
        </section>

            <div  class="modal fade questions" role="dialog">
                    <div class="modal-dialog"> 
                            <!-- Modal content-->
                        <div class="modal-content">
                            <form class="form-horizontal" method="post" action="{{route('uploadAssignment')}}" enctype="multipart/form-data">	
                               
                                <div class="modal-header" style="background-color: #32c5d2; color: #fff;font-weight:bold">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 class="modal-title custom_align" id="Heading">  Upload New Assignment <i class="fa fa-question"></i></h4>
                                </div>
                                <div class="modal-body"> 
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Name of Assignment</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa-book fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="filename"  placeholder="Enter name of assignment" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Last Submission Date</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa-calendar fa" aria-hidden="true"></i></span>
                                                <input type="date" class="form-control" name="submission"  placeholder="Enter name of assignment" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="class_id" value="{{$class_id}}"/>
                                    <input type="hidden" name="course_id" value="{{$course_id}}"/>
                                   
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input-group image-preview form-group">
                                          <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="file" accept="file_extension" name="input-file-preview" required />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
                                   	<button type="button" class="btn btn-danger fa fa-close" data-dismiss="modal">    Close</button>
                                </div>
                                {{csrf_field()}}
                            </form>
                            </div>
                    </div>
            </div>

            
            <div  class="modal fade material" role="dialog">
                    <div class="modal-dialog"> 
                            <!-- Modal content-->
                        <div class="modal-content">
                            <form class="form-horizontal" method="post" action="{{route('uploadMaterial')}}" enctype="multipart/form-data">	
                               
                                <div class="modal-header" style="background-color: #32c5d2; color: #fff;font-weight:bold">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 class="modal-title custom_align" id="Heading">Upload New Material <i class="fa fa-book"></i></h4>
                                </div>
                                <div class="modal-body"> 
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Name of Material</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa-book fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="filename"  placeholder="Enter name of material" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="class_id" value="{{$class_id}}"/>
                                    <input type="hidden" name="course_id" value="{{$course_id}}"/>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input-group image-preview form-group">
                                          <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="file" accept="file_extension" name="input-file-preview" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
                                   	<button type="button" class="btn btn-danger fa fa-close" data-dismiss="modal">    Close</button>
                                </div>
                                {{csrf_field()}}
                            </form>
                            </div>
                    </div>
            </div>

             
            <div  class="modal fade answers" role="dialog">
                    <div class="modal-dialog"> 
                            <!-- Modal content-->
                        <div class="modal-content">

                            <form class="form-horizontal" method="post" action="{{route('uploadAnswer')}}" enctype="multipart/form-data">

                                <div class="modal-header" style="background-color: #32c5d2; color: #fff;font-weight:bold">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 class="modal-title custom_align" id="Heading">Upload Answer <i class="fa fa-book"></i></h4>
                                </div>
                                <div class="modal-body"> 
                                    <input type="hidden" name="class_id" value="{{$class_id}}"/>
                                    <input type="hidden" name="course_id" value="{{$course_id}}"/>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input-group image-preview form-group">
                                          <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="file" accept="file_extension" name="input-file-preview" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
                                   	<button type="button" class="btn btn-danger fa fa-close" data-dismiss="modal">    Close</button>
                                </div>
                                {{csrf_field()}}
                            </form>
                            </div>
                    </div>
            </div>
     @endsection


     @section('footer')

        <script>
            function view(e){
            $('.myModal').on('show.bs.modal',function(e){
                $('#Mtitle').html($(e.relatedTarget).data('title'));
                $('#mode9').html($(e.relatedTarget).data('desc'));

                    });
            
            }

        </script>

@stop
           