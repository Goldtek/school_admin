@extends('layouts.master')

@section('title')
search database of Resumes
@endsection

@section('content')
<style>
    .list-group-item{
        margin-top:.1%;
        margin-bottom:.1%;
    }
    
    .hand{
        cursor: pointer;
        display: block;
        width: 100%;
    }
    
    .checkbox .label{
        padding-left:0px;
    }

</style>
   <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Search Resumes</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">Dashboard</a>
                                </li>
                                <li ><a href="">Job Resumes</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-3 col-sm-4 col-xs-12">
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
                                       <li class="active">
                                            <a href="{{route('company.resume')}}"> <i class="fa fa-file-o"></i>Search Database </a>
                                        </li>
                                         <li>
                                            <a href="{{route('show_shortlist')}}"> <i class="fa fa-file-o"></i>View Shortlist </a>
                                        </li>
                                         <li >
                                            <a href="{{route('company.viewCv')}}"> <i class="fa fa-file-o"></i>Resumes </a>
                                        </li>
                                         <li>
                                            <a href="{{route('company.post')}}"> <i class="fa fa-pencil-square"></i>Post Job </a>
                                        </li>
                                        <li>
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
                        </div>
                        <div class="col-md-7 col-sm-8 col-xs-12" style="margin-top:-30px;">
                            <!-- put it here -->
                              <div class="row">
                                 
                               <form method="post" id="SearchForm"  action="">
                            
                                  <div class="col-md-9">
                                      <div class="form-group">
                                    <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"> <i class="icon-magnifying-glass"></i> </span>
                          <input type="text" class="form-control" placeholder="Search . . ." id="searchRes">
                        </div>        
                                              </div>
                                       </div>
                              
                                <div class="col-md-3 col-sm-12 pull-left" style="margin-top:-37px;">
                                         <button class="btn btn-default pull-right" id="searchBtn" type="button"> Search <i class="fa fa-angle-right"></i></button>
                                    </div>     
                                </form>
                                 
                            </div>
                            <div id="showRes">
                                @if(!empty($users))
                            @include('company.search')
                                
                                @endif
                            </div>
                        </div>
                      <div class="col-md-2 " style="padding-left:0; padding-right:0" >
                       
                          <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" >
                    <h3 class="panel-title">
                       Filter Results </h3>
                </div>
                              
                <div class="panel-body">
                <div class="panel-heading">
                    <strong class="hand" data-toggle="collapse" data-target="#exp"> Years of Experience  <i class="fa fa-caret-down" aria-hidden="true"></i></strong>
                </div>
                    
                    <ul class="list-group" id="exp">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp" class="experience" value="1" />
                                <label for="checkbox">
                                   1-3 Years
                                </label>
                            </div>
                          
                        </li>
                        
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp" class="experience" value="3" />
                                <label for="checkbox2">
                                   3-5 Years
                                </label>
                            </div>
                         
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp"  class="experience" value="5" />
                                <label for="checkbox3">
                                  5-7 Years
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp" class="experience" value="7" />
                                <label for="checkbox4">
                                   7-10 Years
                                </label>
                            </div>
                            
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp" class="experience" value="10" />
                                <label for="checkbox5">
                                   10-15 Years
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="exp" class="experience" value="15" />
                                <label for="checkbox5">
                                   15+ Years
                                </label>
                            </div>
                          
                        </li>
                    </ul>
                    <hr>
                    
                    <!-- next list group -->
                    <div class="panel-heading">
                    <strong class="hand"  data-toggle="collapse" data-target="#lga"> Location (LGA) <i class="fa fa-caret-down" aria-hidden="true"></i></strong>
                </div>
                    
                    <ul class="list-group collapse" id="lga">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Mbaise" />
                                <label for="checkbox">
                                 Mbaise
                                </label>
                            </div>
                          
                        </li>
                        
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Mbano"  />
                                <label for="checkbox2">
                                  Mbano
                                </label>
                            </div>
                         
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ezinihitte" />
                                <label for="checkbox3">
                                 Ezinihitte
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ideato" />
                                <label for="checkbox4">
                                  Ideato 
                                </label>
                            </div>
                            
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ihitte/Uboma" />
                                <label for="checkbox5">
                                   Ihitte/Uboma
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ikeduru" />
                                <label for="checkbox5">
                                   Ikeduru
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Isu" />
                                <label for="checkbox5">
                                   Isu
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Mbaitoli" />
                                <label for="checkbox5">
                                   Mbaitoli
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ngor-Okpala" />
                                <label for="checkbox5">
                                   Ngor-Okpala
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Njaba" />
                                <label for="checkbox5">
                                   Njaba
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Nwangele" />
                                <label for="checkbox5">
                                   Nwangele
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Nkwerre" />
                                <label for="checkbox5">
                                   Nkwerre
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Oguta" />
                                <label for="checkbox5">
                                   Oguta
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Ohaji/Egbema" />
                                <label for="checkbox5">
                                   Ohaji/Egbema
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Okigwe" />
                                <label for="checkbox5">
                                   Okigwe
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Orlu" />
                                <label for="checkbox5">
                                   Orlu
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Orsu" />
                                <label for="checkbox5">
                                   Orsu
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Oru" />
                                <label for="checkbox5">
                                   Oru 
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="loc" class="loc" value="Owerri" />
                                <label for="checkbox5">
                                   Owerri
                                </label>
                            </div>
                          
                        </li>
                    </ul>
                    <hr>
                    
                    
                      <!-- next list group -->
                    <div class="panel-heading">
                    <strong class="hand"  data-toggle="collapse" data-target="#ind"> Specialization <i class="fa fa-caret-down" aria-hidden="true"></i></strong>
                </div>
                     <ul class="list-group collapse" id="ind">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="1" />
                                <label for="checkbox">
                               Financial Services
                                </label>
                            </div>
                          
                        </li>
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="2" />
                                <label for="checkbox">
                               Healthcare / Nutrition
                                </label>
                            </div>
                          
                        </li>
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="3" />
                                <label for="checkbox">
                               ICT / Telecommunications
                                </label>
                            </div>
                          
                        </li>
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="4" />
                                <label for="checkbox">
                               Oil & Gas / Mining
                                </label>
                            </div>
                          
                        </li>
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="5" />
                                <label for="checkbox">
                               FMCG / Conglomerate
                                </label>
                            </div>
                          
                        </li>
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="6" />
                                <label for="checkbox">
                              Government Agencies
                                </label>
                            </div>
                          
                        </li> 
                         <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="7" />
                                <label for="checkbox">
                             Food Services Beverages
                                </label>
                            </div>
                          
                        </li>
                        
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="8" />
                                <label for="checkbox2">
                                  Hospitality
                                </label>
                            </div>
                         
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="9" />
                                <label for="checkbox3">
                                 NGO(Agencies)
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="10" />
                                <label for="checkbox4">
                                Legal/Law
                                </label>
                            </div>
                            
                        </li> <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="11" />
                                <label for="checkbox4">
                                Logistics
                                </label>
                            </div>
                            
                        </li>
                       
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="12" />
                                <label for="checkbox5">
                                    	Construction / Real Estate
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="13" />
                                <label for="checkbox5">
                                   Engineering
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="14" />
                                <label for="checkbox5">
                                   Agriculture
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="15" />
                                <label for="checkbox5">
                                   Consulting
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="16" />
                                <label for="checkbox5">
                                   Advertising/Media
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="17" />
                                <label for="checkbox5">
                                   Education Services
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="18" />
                                <label for="checkbox5">
                                   Manufacturing
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="19" />
                                <label for="checkbox5">
                                   Ecommerce 
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="20" />
                                <label for="checkbox5">
                                  Trade/Services
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="21" />
                                <label for="checkbox5">
                                   Security Agencies
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="22" />
                                <label for="checkbox5">
                                   Beverages/Drinks
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="23" />
                                <label for="checkbox5">
                                   Art/Design
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="24" />
                                <label for="checkbox5">
                                   Fashion/Clothings 
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="25" />
                                <label for="checkbox5">
                                   Energy/Power
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="26" />
                                <label for="checkbox5">
                                   Automotive/Car Services
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="27" />
                                <label for="checkbox5">
                                 Gaming / Sports
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="spec" class="spec" value="28" />
                                <label for="checkbox5">
                                   Staffing & Employment Agencies
                                </label>
                            </div>
                          
                        </li>
                    </ul>
                    <hr>
                    
                    
                      <!-- next list group -->
                    <div class="panel-heading">
                    <strong class="hand"  data-toggle="collapse" data-target="#sal"> Expected Salary  <i class="fa fa-caret-down" aria-hidden="true"></i></strong>
                </div>
                     <ul class="list-group collapse" id="sal">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input  type="checkbox" name="sal" class="salary" value="1" />
                                <label for="checkbox">
                              Below 75,000
                                </label>
                            </div>
                          
                        </li> <li class="list-group-item">
                            <div class="checkbox">
                                <input  type="checkbox" name="sal" class="salary" value="2" />
                                <label for="checkbox">
                               N75,000 -N150,000
                                </label>
                            </div>
                          
                        </li>
                        
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="3" />
                                <label for="checkbox2">
                                N150,000 - N250,000
                                </label>
                            </div>
                         
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="4" />
                                <label for="checkbox3">
                                 N250,000 - N400,000
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="5" />
                                <label for="checkbox4">
                                N400,000 - N600,000
                                </label>
                            </div>
                            
                        </li>
                      
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="6" />
                                <label for="checkbox5">
                                    	N600,000 - N900,000
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="7"/>
                                <label for="checkbox5">
                                   N900,000 - N1,200,000
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="8" />
                                <label for="checkbox5">
                                   N1,200,000 - N1,500,000
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="9" />
                                <label for="checkbox5">
                                   N1,500,000 - N2,000,000
                                </label>
                            </div>
                          
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="10" />
                                <label for="checkbox5">
                                  N2,000,000 - N3,000,000
                                </label>
                            </div>
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="11" />
                                <label for="checkbox5">
                                N3,000,000 - N4,000,000
                                </label>
                            </div>
                        </li>  <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="12" />
                                <label for="checkbox5">
                                N4,000,000 - N5,000,000
                                </label>
                            </div>
                        </li>
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="sal" class="salary" value="13" />
                                <label for="checkbox5">
                                  Above N5,000,000
                                </label>
                            </div>
                        </li>
                  
                    </ul>
                    <hr>
                      <!-- next list group -->
                    <div class="panel-heading">
                    <strong class="hand"  data-toggle="collapse" data-target="#jbl"> Job Levels <i class="fa fa-caret-down" aria-hidden="true"></i></strong>
                </div>
                     <ul class="list-group collapse" id="jbl">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="skil" class="levy" value="1" />
                                <label for="checkbox">
                              Semi-Skilled/Unskilled
                                </label>
                            </div>
                          
                        </li>
                        
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="skil" class="levy" value="2" />
                                <label for="checkbox2">
                             Internship
                                </label>
                            </div>
                         
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="skil" class="levy" value="3" />
                                <label for="checkbox3">
                              Fresh Graduate/ Entry
                                </label>
                            </div>
                          
                        </li><li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="skil" class="levy" value="4" />
                                <label for="checkbox3">
                               Experienced (Non-Manager)
                                </label>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                               <input type="checkbox" name="skil" class="levy" value="5" />
                                <label for="checkbox4">
                                Manager/Supervisor
                                </label>
                            </div>
                            
                        </li>
                       
                    
                    <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" name="skil" class="levy" value="6" />
                                <label for="checkbox5">
                                  Executive (CEO/CFO/COO)
                                </label>
                            </div>
                        </li>
                  
                    </ul>
                    <hr>
                </div>           
                              
                        
                              
            </div> 
                          
                          
                        </div>  
                        
                    </div>
                </div>
            </div>
        </section>
<style>
.checkbox label, .checkbox label {
    margin-left:-5px !important;
    }
    
    .row{
    margin-top:40px;
    padding: 0 10px;
}

.clickable{
    cursor: pointer;   
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
</style>

@endsection

@section('footer')
<script>
    $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();

        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       
        getData(page);
    });


function getData(page){
    
      var search = $('#searchRes').val(),
        loc = $("input[class='loc']:checked").val()!== undefined ? $("input[class='loc']:checked").val() :'',
        spec = $("input[class='spec']:checked").val()!== undefined ? $("input[class='spec']:checked").val() :'',
        salary = $("input[class='salary']:checked").val()!== undefined ? $("input[class='salary']:checked").val() :'',
        exp = $("input[class='exp']:checked").val()!== undefined ? $("input[class='exp']:checked").val() :'',
     jobLevel = $("input[class='levy']:checked").val()!== undefined ? $("input[class='levy']:checked").val() :'';
    
    
        $.ajax(
        {
            url: '/search/?page=' + page,
            type: "get",
            datatype: "html",
             data:{search:search,location:loc,spec:spec,experience:exp,job_level:jobLevel,salary:salary},
            success:function(data){
           // bootbox.alert(data);
              $("#showRes").html(data);
                
        },error:function(err){
            console.log(err.responseText);
        }
        });  
        
}
</script>

@stop