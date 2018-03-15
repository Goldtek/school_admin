@extends('layouts.admin_master')

@section('title')
Create New article
@endsection

@section('head')
 <!-- FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href={{URL::to("css/jquery.tagsinput.min.css")}}>
@endsection

@section('content')

 <section class="company-dashboard">
            <div class="container">
               
            </div>
        </section>

        <section class="post-job light-grey">
            <div class="container">
                <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                         <li>
                                            <a href="{{route('admin.dashboard')}}"> <i class="fa fa-tachometer"></i> View Articles</a>
                                        </li>
                                        <li  class="active">
                                            <a href="{{route('admin.create')}}"> <i class="fa fa-plus"></i>  New Article</a>
                                        </li>
                                     
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    <div class="col-md-8 col-sm-12 col-xs-12 ">
                              @if($errors->any())
                                    <div class="alert alert-warning  alert-dismissible" role="alert" >
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                            @endif
                        <div class="Heading-title-left black small-heading">
                            <h3>Post An Article</h3>
                           
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" action="{{route('admin.create')}}" method="post" enctype="multipart/form-data">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label> Title Of Article</label>
                                        <input id="title" name="title" type="text" placeholder="Job Title" class="form-control" required>
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-12">
                                          <label>Upload Image: <span class="required">*</span></label>
                                        <div class="input-group image-preview form-group">
                                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="file_extension" name="image" required />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                  
                                <div class="clearfix"></div>
                                
                            
                              
                                
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>content of Article</label>
                                        <textarea name="desc" id="desc" required></textarea>
                                    </div>
                                </div>
                                 
                                {{csrf_field()}}
                                
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <div class="alert alert-danger" style="display:none"></div>
                                </div>
                                
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-default pull-right" id="postBtn">Post Article <i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 col-md-pull-8">
                       
                    
                    </div>
                </div>
            </div>
        </section>
       
@stop

@section('footer')

 <!-- FOR THIS PAGE ONLY -->
        <script type="text/javascript" src={{URL::to("js/jquery.tagsinput.min.js")}}></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>

        <!-- CK-EDITOR -->
        <script src={{URL::to("http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js")}}></script>
        <script type="text/javascript">
            CKEDITOR.replace('desc');
           
        </script>
        <!-- FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>
        <script type="text/javascript" src={{URL::to("js/map.js")}}></script>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>
<script>
		$(document).ready(function(e){
		<!--ToolTips Initialization-->
			
			/*-- DATE AND TIME PICKER --*/
	
			$('#datetimepicker1').datetimepicker();
			
			$('.search-panel .dropdown-menu').find('a').click(function(e) {
				e.preventDefault();
				var param = $(this).attr("href").replace("#","");
				var concept = $(this).text();
				$('.search-panel span#search_concept').text(concept);
				$('.input-group #search_param').val(param);
			});
			$(window).scroll(function() {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > 300) {
					$(".mega-menu").addClass("navbar-fixed-top");
		
				} else if (scrollTop < 300) {
					$(".mega-menu").removeClass("navbar-fixed-top");
				}
			});
		});
    </script>
@stop