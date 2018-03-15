@extends('layouts.master')

@section('title')
Post Job
@endsection

@section('head')
 <!-- FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href={{URL::to("css/jquery.tagsinput.min.css")}}>
@endsection

@section('content')

 <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post A Job </h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li><a href="#">Dashboard</a> </li>
                                <li class="active">Post Job </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="post-job light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 col-md-push-4">
                        <div class="Heading-title-left black small-heading">
                            <h3>Post A New job</h3>
                           
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" id="postJob" method="post">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input id="title" type="text" placeholder="Job Title" class="form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="userid" id="userid" value="{{Auth::guard('admin')->user()->id}}">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select name="jlocation" id="jlocation" required class="form-control">
                                            <option value="">Select Location</option>
                                                <option value="Aboh-Mbaise">Aboh-Mbaise</option>
                                                <option value="Ahiazu-Mbaise">Ahiazu-Mbaise</option>
                                                <option value="Ehime-Mbano">Ehime-Mbano</option>
                                                <option value="Ezinihitte">Ezinihitte</option>
                                                <option value="Ideato North">Ideato North</option>
                                                <option value="Ideato South">Ideato South</option>
                                                <option value="Ihitte/Uboma">Ihitte/Uboma</option>
                                                <option value="Ikeduru">Ikeduru</option>
                                                <option value="Isiala Mbano">Isiala Mbano</option>
                                                <option value="Isu">Isu</option>
                                                <option value="Mbaitoli">Mbaitoli</option>
                                                <option value="Ngor-Okpala">Ngor-Okpala</option>
                                                <option value="Njaba">Njaba</option>
                                                <option value="Nwangele">Nwangele</option>
                                                <option value="Obowo">Nkwerre</option>
                                                <option value="">Obowo</option>
                                                <option value="Oguta">Oguta</option>
                                                <option value="Ohaji/Egbema">Ohaji/Egbema</option>
                                                <option value="Okigwe">Okigwe</option>
                                                <option value="Orlu">Orlu</option>
                                                <option value="Orsu">Orsu</option>
                                                <option value="Oru East">Oru East</option>
                                                <option value="Oru West">Oru West</option>
                                                <option value="Owerri-Municipal">Owerri-Municipal</option>
                                                <option value="Owerri North">Owerri North</option>
                                                <option value="Owerri West">Owerri West</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Category/ Industry</label>
                                        <select id="industry" class="questions-category form-control" multiple="multiple" required>
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
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Level</label>
                                        <select id="joblevel" class="questions-category form-control" required>
                                             <option value="1">Vocational/Semi-Skilled/Unskilled Labour</option>
                                                <option value="2"> Undergraduate Internship/Vacation Job</option>
                                                <option value="3">Fresh Graduate/Entry Level/Graduate Internship</option>
                                                <option value="4">Experienced (Non-Manager) </option>
                                                <option value="5">  Manager (Staff Supervisor/Head of Department)</option>
                                                 <option value="6">  Executive (Director/CEO/CFO/COO)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type</label>
                                          <select id="jobtype" class="questions-category form-control" required>
                                            <option value="0">Full Time</option>
                                            <option value="1">Part Time</option>
                                            <option value="2">Remote</option>
                                            <option value="3">Freelancer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Experience</label>
                                        <select id="experience" class="questions-category form-control" required>
                                            <option value="0">fresher</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
                                            <option value="6">6 Years</option>
                                            <option value="7">7 Years</option>
                                            <option value="8">8 Years</option>
                                            <option value="9">9 Years</option>
                                            <option value="10">10 Years</option>
                                            <option value="11">11 Years</option>
                                            <option value="12">12 Years</option>
                                            <option value="13">13 Years</option>
                                            <option value="14">14 Years</option>
                                            <option value="15">15 Years</option>
                                            <option value="16">16 Years</option>
                                            <option value="17">17 Years</option>
                                            <option value="18">18 Years</option>
                                            <option value="19">19 Years</option>
                                            <option value="20">20 Years</option>
                                            <option value="21">21 Years</option>
                                            <option value="22">22 Years</option>
                                            <option value="23">23 Years</option>
                                            <option value="24">24 Years</option>
                                            <option value="25">25 Years</option>
                                            <option value="26">26 Years</option>
                                            <option value="27">27 Years</option>
                                            <option value="28">28 Years</option>
                                            <option value="29">29 Years</option>
                                            <option value="30">30 Years</option>
                                            <option value="31">31 Years</option>
                                            <option value="32">32 Years</option>
                                            <option value="33">33 Years</option>
                                            <option value="34">34 Years</option>
                                            <option value="35">35 Years</option>
                                            <option value="36">36 Years</option>
                                            <option value="37">37 Years</option>
                                            <option value="38">38 Years</option>
                                            <option value="39">39 Years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Expected Salary</label>
                                        <select id="salary" class="questions-category form-control" required>
                                          <option value="1">Below 75,000</option>
                                                <option value="2">N75,000 - N150,000</option>
                                                <option value="3" >N150,000 - N250,000</option>
                                                <option value="4">N250,000 - N400,000</option>
                                                <option value="5">N400,000 - N600,000</option>
                                                <option value="6">N600,000 - N900,000</option>
                                                <option value="7">N900,000 - N1,200,000</option>
                                                <option value="8">N1,200,000 - N1,500,000</option>
                                                <option value="9">N1,500,000 - N2,000,000</option>
                                                <option value="10">N2,000,000 - N3,000,000</option>
                                                <option value="11">N3,000,000 - N4,000,000</option>
                                                <option value="12">N4,000,000 - N5,000,000</option>
                                                <option value="13">Above N5,000,000</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>End Date</label>
                                       <div class="input-group date" id="datetimepicker1">
                                <span class="input-group-addon"> <span class="glyphicon-calendar glyphicon"></span> </span> 
                              <input type="text" id="enddate" class="form-control" name="date" placeholder="Select Date and Time">
                                    </div>
                                </div>
                                </div>
                                   <div class="clearfix"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Number of Vacancy</label>
                                       <select id="vacancy" class="questions-category form-control" required>
                                          <option value="1">1</option>
                                                <option value="2 - 5">2 - 5 </option>
                                                <option value="5 - 10" >5 - 10</option>
                                                <option value="10 - 20">10 - 20</option>
                                                <option value="30">30 and Above</option>
                                             
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <input type="text" id="tags" value="software ,laravel, html" class="form-control" data-role="tagsinput" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Detials</label>
                                        <textarea name="ckeditor" id="ckeditor" required></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Requirements</label>
                                        <textarea name="specs" id="specs" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Responsibilities</label>
                                        <textarea name="res" id="res" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <div class="alert alert-danger" style="display:none"></div>
                                </div>
                                
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <button type="button" class="btn btn-default pull-right" id="postBtn">Post Job <i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 col-md-pull-8">
                        <section class="dashboard-body">
                     <div class="panel">
                                <div class="dashboard-logo-sidebar">
                        <img class="img-responsive center-block" src={{URL::to(Auth::guard('admin')->user()->logo)}} >
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4>{{Auth::guard('admin')->user()->name}}</h4>
                                </div>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="{{route('company.dashboard')}}"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.edit')}}"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.resume')}}"> <i class="fa fa-file-o"></i>Search Database </a>
                                        </li>
                                         <li>
                                            <a href="{{route('show_shortlist')}}"> <i class="fa fa-file-o"></i>View Shortlist </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.viewCv')}}"> <i class="fa fa-file-o"></i>Resumes </a>
                                        </li>
                                         <li class="active">
                                            <a href="{{route('company.post')}}"> <i class="fa fa-pencil-square"></i>Post Job </a>
                                        </li>
                                        <li >
                                            <a href="{{route('company.jobs')}}"> <i class="fa  fa-list-ul"></i> Active Jobs</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.featured')}}"> <i class="fa  fa-list-alt"></i> Featured Jobs</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.followers')}}"> <i class="fa  fa-bookmark-o"></i> Followers </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </section>
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
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('specs');
            CKEDITOR.replace('res');
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