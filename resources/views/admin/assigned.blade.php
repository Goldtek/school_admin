@extends('layouts.admin_master')

@section('title')
Admin - Assigned Courses
@endsection

@section('content')


        <section class="company-dashboard">
            <div class="container">
               
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    
                    
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="{{route('view_assigned')}}"> <i class="fa fa-user"></i> Assigned Courses</a>
                                        </li>
                                        <li>
                                            <a href="{{route('view_courses')}}"> <i class="fa fa-book"></i> Courses</a>
                                        </li>
                                        <li>
                                            <a href="{{route('view_user_dept')}}"> <i class="fa fa-th"></i>Departments</a>
                                        </li>
                                         <li >
                                            <a href="{{route('view_student')}}"> <i class="fa fa-user"></i> Students</a>
                                        </li>
                                        <li>
                                            <a href="{{route('view_ta')}}"> <i class="fa fa-user"></i> Lecturers/TA</a>
                                        </li>
                                      
                                        <li>
                                            <a href="{{route('view_level')}}"> <i class="fa fa-th"></i> Levels </a>
                                        </li>
                                      
                                        <li>
                                            <a href="{{route('view_class')}}"> <i class="fa fa-th"></i> Class </a>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </div>
                    </div>
                        
                    
                    <div class="col-md-9">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                             
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-3">
                                               <div class="btn-group" style="margin-bottom:2%">
                                                    <a class="btn btn-primary" data-placement="top" 
                                                    data-target="#dept" data-tooltip="true" data-toggle="modal" title="Assign a Course to a Lecturer" >  <i class="fa fa-plus"></i> Assign Course
                                                       
                                                    </a>
                                                </div>  
                                            </div>
                                           <div class="col-md-9">
                                                @if(Session::has('info'))
                                             <div class="alert alert-success alert-dismissible" role="alert" onload="run()">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                        {{Session::get('info')}}
                                                        </div>
                                                        @endif
                                            </div>
                                       
									   </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                 <th>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                       
                                                <td>Department</td>
                                                <td>Level</td>
                                                <td> Course </td>
                                                <td> Lecturer</td>
                                               
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($assigned as $asg)
                                            
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 

                                                <?php
                                                 $class =  DB::table('classes')->where('id',$asg->class_id)->first();
                                                ?>

                                                <td> @foreach($departments as $d)
                                                        @if($class->department_id==$d->id)
                                                        {{$d->name}}
                                                        @endif
                                                     @endforeach
                                                 </td>
                                                
                                                <td> 
                                                    @foreach($levels as $l)
                                                            @if($class->level_id==$l->id)
                                                            {{$l->name}}
                                                            @endif
                                                        @endforeach
                                                 </td>
                                                 <td> {{DB::table('courses')->where('id',$asg->course_id)->first()->name}} </td>
                                                <td> <?php $user = DB::table('users')->where('id',$asg->user_id)->first() ?>
                                                        {{$user->fname}} {{$user->sname}}
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;" onclick="dept()" data-course="{{$asg->course_id}}" data-user="{{$asg->user_id}}" data-id="{{$asg->id}}" data-class="{{$asg->class_id}}" data-tooltip="true" data-toggle="modal" data-placement="top" title="Edit Class" data-target=".dept">
                                                                    <i class="fa fa-pencil"></i> Edit  </a>
                                                            </li>
                                                           
                                                          
                                                        </ul>
                                                       
                                                    </div>
                                                </td>
                                                <!-- end of command button -->
                                                
                                            </tr>
                                            @endforeach 
                                               
                                           
									   </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        
                        <!--begining of modal -->
                         <div  class="modal fade myModal" role="dialog">
                        <div class="modal-dialog"> 
                             
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header rte">
                                    <h2 class="modal-title" id="Mtitle">  </h2>
                                </div>
                                <div class="modal-body" id="mode9">
                                    
                                     
                                </div>
                                <div class="modal-footer">
                                   	
                                    <button type="button" class="btn btn-danger fa fa-close" data-dismiss="modal">    Close</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end of modal -->
                        
                        </div>
                </div>
            </div>
        </section>

        
                            <!--- modal create -->
<div class="modal fade" id="dept" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">               
         		
 	<form class="form-horizontal" method="post" action="" id="createDept">	
        <div class="modal-header" style="background-color: #32c5d2; color: #fff;font-weight:bold">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title custom_align" id="Heading">Assign Course</h4>
      </div>
        
        <!-- beginning of modal body -->
          <div class="modal-body" style="padding:5%">	

                      

                    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department-Level</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<select class="form-control" name="class_id"   required>
                                        <option value=""> Select Class</option>
                                        @foreach($classes as $c)
                                        <option value="{{$c->id}}"> 
                                        @foreach($departments as $d)
                                            @if($c->department_id==$d->id)
                                                {{$d->name}}
                                            @endif
                                        @endforeach

                                        @foreach($levels as $l)
                                            @if($c->level_id==$l->id)
                                                {{$l->name}}
                                            @endif
                                        @endforeach
                                        
                                         </option>
                                        @endforeach
                                    </select>
								</div>
							</div>
						</div>


                        <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Course</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
                                <select class="form-control" name="course_id"    required>
                                    <option value=""> Select Course</option>
                                    @foreach($courses as $c)
                                    <option value="{{$c->id}}"> {{$c->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Lecturer</label>
							<div class="cols-sm-10">
								<div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<select class="form-control" name="user_id"  required>
                                        <option value=""> Select Course</option>
                                        @foreach($lecturers as $u)
                                        <option value="{{$u->id}}"> {{$u->fname}} {{$u->sname}} </option>
                                        @endforeach
                                    </select>
								</div>
							</div>
						</div>

						
						
                        {{csrf_field()}}
					     
        	          
      </div>
        <!-- end of modal body -->
        
        <!-- footer -->
          <div class="modal-footer ">
              <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
      </div>

          		</form>
          </div>
    <!-- /.modal-content --> 
  </div>
      
    </div>
                 
            
                                   <!--- modal update -->
<div class="modal fade dept" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">               
         		
 	<form class="form-horizontal" method="post" id="editDept">	
    <div class="modal-header" style="background-color:#f1c40f; color:#fff;font-weight:bold">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title custom_align" id="Heading">Update Assigned Course</h4>
    </div>
        
        <!-- beginning of modal body -->      
          <div class="modal-body" style="padding:5%">
        	
          <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department-Level</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<select class="form-control" name="class_id" id="class"  required>
                                        <option value=""> Select Class</option>
                                        @foreach($classes as $c)
                                        <option value="{{$c->id}}"> 
                                        @foreach($departments as $d)
                                            @if($c->department_id==$d->id)
                                                {{$d->name}}
                                            @endif
                                        @endforeach

                                        @foreach($levels as $l)
                                            @if($c->level_id==$l->id)
                                                {{$l->name}}
                                            @endif
                                        @endforeach
                                        
                                         </option>
                                        @endforeach
                                    </select>
								</div>
							</div>
						</div>


                        <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Course</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
                                <select class="form-control" name="course_id" id="course"    required>
                                    <option value=""> Select Course</option>
                                    @foreach($courses as $c)
                                    <option value="{{$c->id}}"> {{$c->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                        <input type="hidden" name="id" id="id"/>
                    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Lecturer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<select class="form-control" name="user_id" id="user"  required>
                                        <option value=""> Select Course</option>
                                        @foreach($lecturers as $u)
                                        <option value="{{$u->id}}"> {{$u->fname}} {{$u->sname}} </option>
                                        @endforeach
                                    </select>
								</div>
							</div>
						</div>

						
					

        <!-- end of modal body -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
        <!-- footer -->
            <div class="modal-footer ">
              <button type="submit" class="btn btn-warning"><span class="fa fa-check"></span> Update </button>
            </div>

    </form>
</div>
    <!-- /.modal-content --> 
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


$("#createDept").submit(function(e){ 
        
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "{{route('saveAssigned')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('#dept').modal('hide');
                 bootbox.alert(data); 
                setInterval(function(){ location.reload() }, 5000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
    });

$("#editDept").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "{{route('updateAssigned')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('.dept').modal('hide'); 
                 bootbox.alert(data);
              setInterval(function(){ location.reload() }, 5000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
});


    function dept(e){
    $('.dept').on('show.bs.modal',function(e){
        $('#course').val($(e.relatedTarget).data('course'));
        $('#class').val($(e.relatedTarget).data('class'));
        $('#user').val($(e.relatedTarget).data('user'));
        $('#id').val($(e.relatedTarget).data('id'));
            });
    }


</script>

@stop