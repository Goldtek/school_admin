@extends('layouts.admin_master')

@section('title')
Admin - Departments
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
                            <li class="active">
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
                                                    data-target="#dept" data-tooltip="true" data-toggle="modal" title="Create New Department" >  <i class="fa fa-plus"></i> Create New Department
                                                       
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
                                                
                                                <td>Department Name</td>
                                                    <td>Active Status</td>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($department as $dept)
                                            
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 
                                                
                                                <td> {{$dept->name}} </td>
                                                
                                                <td>
                                                    @if($dept->active==1)
                                                    <span class="label label-sm label-success"> Active </span>
                                                         @else
                                                     <span class="label label-sm label-warning"> Inactive </span>
                                                      @endif 
                                                </td>
                                              <!-- command buttons -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;" onclick="dept()" data-name="{{$dept->name}}" data-active="{{$dept->active}}" data-id="{{$dept->id}}" data-tooltip="true" data-toggle="modal" data-placement="top" title="Edit User Department" data-target=".dept">
                                                                    <i class="fa fa-pencil"></i> Edit User Department </a>
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
            <h4 class="modal-title custom_align" id="Heading">Create New User Department</h4>
      </div>
        
        <!-- beginning of modal body -->
          <div class="modal-body" style="padding:5%">	
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="deptname" id="deptname"  placeholder="Enter Department Name" required/>
								</div>
							</div>
						</div>

						
                        <input type="hidden" name="id">
						<div class="form-group">
							<label for="make-active" class="cols-sm-2 control-label">Make Active</label>
							<select class="form-control" name="active">
                                <option value="">select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
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
        <h4 class="modal-title custom_align" id="Heading">Update User Department</h4>
    </div>
        
        <!-- beginning of modal body -->      
          <div class="modal-body" style="padding:5%">
        	
				    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter Department Name" required/>
								</div>
							</div>
				    </div>

						
                    <input type="hidden" name="id" id="id">
						<div class="form-group">
							<label for="make-active" class="cols-sm-2 control-label">Make Active</label>
									<select class="form-control" name="active" id="active">
                                    <option >select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                    </select>
						</div>

						
						
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
            url: "{{route('saveStaffDept')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('#dept').modal('hide');
                 bootbox.alert(data); 
                setInterval(function(){ location.reload() }, 6000);
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
            url: "{{route('system_update_user_department')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('.dept').modal('hide'); 
                 bootbox.alert(data);
              setInterval(function(){ location.reload() }, 60000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
});


    function dept(e){
    $('.dept').on('show.bs.modal',function(e){
        $('#name').val($(e.relatedTarget).data('name'));
        $('#active').val($(e.relatedTarget).data('active'));
        $('#id').val($(e.relatedTarget).data('id'));
            });
    }


</script>

@stop