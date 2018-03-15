@extends('layouts.admin_master')

@section('title')
Admin - Classes
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
                                    <li >
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
                                <li class="active">
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
                                                    data-target="#dept" data-tooltip="true" data-toggle="modal" title="Create Department with Level" >  <i class="fa fa-plus"></i> Create New Class
                                                       
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
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($classes as $dept)
                                            
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 
                                                
                                                <td> @foreach($departments as $d)
                                                        @if($dept->department_id==$d->id)
                                                        {{$d->name}}
                                                        @endif
                                                     @endforeach
                                                 </td>
                                                
                                                <td> 
                                                    @foreach($levels as $l)
                                                            @if($dept->level_id==$l->id)
                                                            {{$l->name}}
                                                            @endif
                                                        @endforeach
                                                 </td>
                                              <!-- command buttons -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;" onclick="dept()" data-dept="{{$dept->department_id}}" data-level="{{$dept->level_id}}" data-id="{{$dept->id}}" data-tooltip="true" data-toggle="modal" data-placement="top" title="Edit Class"
                                                                 data-target=".dept">
                                                                    <i class="fa fa-pencil"></i> Edit Class </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" onclick="viewCourses()"  data-id="{{$dept->id}}" data-tooltip="true" data-toggle="modal" data-placement="top" title="Edit Class" data-target=".viewcourses">
                                                                    <i class="fa fa-eye"></i>  Courses </a>
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
            <h4 class="modal-title custom_align" id="Heading">Create New Class</h4>
      </div>
        
        <!-- beginning of modal body -->
          <div class="modal-body" style="padding:5%">	
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<select class="form-control" name="department_id"   required>
                                        <option value=""> Select Department</option>
                                        @foreach($departments as $d)
                                        <option value="{{$d->id}}"> {{$d->name}} </option>
                                        @endforeach
                                    </select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="make-active" class="cols-sm-2 control-label">Level</label>
							<select class="form-control" name="level_id"  required>
                                        <option value=""> Select Level</option>
                                        @foreach($levels as $l)
                                        <option value="{{$l->id}}"> {{$l->name}} </option>
                                        @endforeach
                                    </select>
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
                    <h4 class="modal-title custom_align" id="Heading">Update Class</h4>
                </div>
                    
                    <!-- beginning of modal body -->      
                    <div class="modal-body" style="padding:5%">
                        <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Department</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
                                                <select class="form-control" name="department_id" id="dept_id"   required>
                                                    <option value=""> Select Department</option>
                                                    @foreach($departments as $d)
                                                    <option value="{{$d->id}}"> {{$d->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="make-active" class="cols-sm-2 control-label">Level</label>
                                        <select class="form-control" name="level_id" id="level" required>
                                                    <option value=""> Select Level</option>
                                                    @foreach($levels as $l)
                                                    <option value="{{$l->id}}"> {{$l->name}} </option>
                                                    @endforeach
                                                </select>
                                    </div>

                                    <input type="hidden" name="id" id="id" />
                                    
                                    {{csrf_field()}}
                                    
                                
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



              
              <!--- modal courses -->
    <div class="modal fade viewcourses" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">               
				<form class="form-horizontal" id="formCourses"  method="post">
								
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						<h4 class="modal-title custom_align" id="Heading"> Courses </h4>
					</div>
					
					<!-- beginning of modal body -->
					  <div class="modal-body" style="padding:5%">
					           <input type="hidden" name="class_id" id="cid"/>
								<div class="form-group">
									
									<div class="services" style="margin-top:1%; margin-bottom:4%;">
									   
									</div>
									<input type="hidden" id="counter" name="counter" value="0">
									<button type="button" class="addClass btn btn-primary btn-md "> <i class="fa fa-plus"></i> Add Course</button>
								</div>
		 
							
					  <button type="submit" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
						</div>	
					  
								
								{{csrf_field()}}
							  
					</div>
					<!-- end of modal body -->
				</form>
			</div>
			<!-- /.modal-content --> 
		</div>
      
    </div>



@endsection

@section('footer')

<script>


$("#createDept").submit(function(e){ 
        
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "{{route('saveClass')}}",
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
            url: "{{route('updateClass')}}",
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
            $('#level').val($(e.relatedTarget).data('level'));
            $('#dept_id').val($(e.relatedTarget).data('dept'));
            $('#id').val($(e.relatedTarget).data('id'));
        });
    }


function viewCourses(e){
    $('.viewcourses').on('show.bs.modal',function(e){
        $('#cid').val($(e.relatedTarget).data('id'));
    $.ajax({
            type:'GET',
            url:"{{route('vendorServices')}}",
            data:{id:$(e.relatedTarget).data('id')},
            dataType:'html',
            success:function(data){
               if(data!=''){   
                    $('.services').html(data);
                    $('.services').css("display","block");
               }else{
                     $('.services').empty();
                    $('#counter').val(0);
               }
            },error:function(err){
            console.log(err.responseText);
                             }
            });
        });
}

$("#formCourses").submit(function(e){ 
        
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "{{route('saveClassCourses')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('.viewcourses').modal('hide');
                 bootbox.alert(data); 
                setInterval(function(){ location.reload() }, 5000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
    });

var j = 1;
        $('.addClass').on('click', function () {
            $.ajax({
                type:'GET',
                url:"{{route('dynamics')}}",
                data:{i:j},
                dataType:'html',
                success:function(data){
                $('.services').append(data);    
                },error:function(err){
                    console.log(err.responseText);
                }
           });
            
            j++;  
			
             var count = parseInt($('#counter').val());
            count = count + 1;
            
           	document.getElementById('counter').value = count;
            
            
        });
        
        

    
    $(document).on('click', '.btn_remove', function ()
		{
			var id = $(this).attr("id");
			$('#row'+id+"").remove();			
			//reducing the count value
          var count =  parseInt($('#counter').val());
		var c = count - 1;
        $('#counter').val(c);
       

		});
    



</script>

@stop