@extends('layouts.admin_master')

@section('title')
Admin - Lectures/TA
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
                                <li class="active">
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
                                                    data-target="#dept" data-tooltip="true" data-toggle="modal" title="Add a Lecturer or Teacher Assisntant" >  <i class="fa fa-plus"></i> Create New Lecturer
                                                       
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
                                                       
                                                <td>Name</td>
                                                <td>Email</td>
                                               
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($lecturers as $ta)
                                            
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 

                                                <td> {{$ta->fname}} {{$ta->sname}} </td>
                                                <td> {{$ta->email}}</td>
                                              
                                                 
                                              <!-- command buttons -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                       
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
            <h4 class="modal-title custom_align" id="Heading">Create New Lecturer/TA</h4>
      </div>
        
        <!-- beginning of modal body -->
          <div class="modal-body" style="padding:5%">	

                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname"  placeholder="Enter your Firstname" required/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="sname"  placeholder="Enter Lecturer/TA Lastname" required/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Email Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email"  placeholder="Enter Lecturer/TA Email Address" required/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" autocomplete="false" name="password"  placeholder="Enter Lecturer/TA Password" required/>
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
        <h4 class="modal-title custom_align" id="Heading">Update Level</h4>
    </div>
        
        <!-- beginning of modal body -->      
          <div class="modal-body" style="padding:5%">
        	
				    

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
            url: "{{route('saveTa')}}",
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
            url: "{{route('updateTa')}}",
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
        $('#dept').val($(e.relatedTarget).data('dept_id'));
        $('#id').val($(e.relatedTarget).data('id'));
            });
    }


</script>

@stop