@extends('layouts.admin_master')

@section('title')
Admin Dashboard
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
                                            <a href=""> <i class="fa fa-tachometer"></i> View Articles</a>
                                        </li>
                                        <li>
                                            <a href=""> <i class="fa fa-plus"></i>New Article</a>
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
                                                    <a href="" class="btn btn-primary" data-placement="top" >  <i class="fa fa-plus"></i> Create New Article
                                                       
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
                                                <th>Topic</th>
                                                <th>Date Created</th>
                                                 <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              
                                         
                                            <tr class="odd gradeX">
                                               <td> </td>
                                                <td> </td>
                                            
                                              <!-- command buttons -->
                                         
                                                       
                                          <td>
                                  <div class="btn-group">
                                   <button class="btn btn-xs btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                               <i class="fa fa-angle-down"></i>
                                      </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                           
                          <li>
                          <a href="javascript:;" onclick="view()" data-target=".myModal" data-tooltip="true" data-toggle="modal" data-placement="top" itle="View Article">
                              <i class="fa fa-pencil"></i>  view  </a>
                             </li>                                    
                          <li>
                          <a href=""  data-tooltip="true"  data-placement="top" title="Delete Article">
                              <i class="fa fa-trash"></i>  Delete  </a>
                             </li>     
                                      </ul>
                                              
                                              
                                              </div>
                                                </td>
                                          
                                                
                                                <!-- end of command button -->
                                                
                                            </tr>
                                          
                                           
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