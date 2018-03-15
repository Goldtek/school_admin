@extends('layouts.master')

@section('title')
Edit Profile
@endsection

@section('content')


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit Your Profile</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">Dashboard</a>
                                </li>
                                <li class="active">Edit Profile</li>
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
                        <div class="col-md-4 col-sm-4 col-xs-12">
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
                                        <li class="active">
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
                                         <li>
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
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="heading-inner first-heading">
                                <p class="title">Edit Profile</p>
                            </div>

                            <div class="profile-edit row">
                                <form  action="{{route('company.editProfile',['id'=>Auth::guard('admin')->user()->id])}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                     <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Compnay Name: <span class="required">*</span></label>
                                            <input type="text" placeholder="" required name="name" class="form-control" value="{{Auth::guard('admin')->user()->name}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Industry: <span class="required">*</span></label>
                                           <select name="industry" required class="form-control">
                                            <option value="" selected="selected">Select Industry</option>
                                            <option value="1" {{Auth::guard('admin')->user()->industry=="1" ? 'selected' : ''}}>Banking / Financial Services</option>
                                            <option value="2"{{Auth::guard('admin')->user()->industry=="2" ? 'selected' : ''}} >Healthcare / Nutrition</option>
                                            <option value="3" {{Auth::guard('admin')->user()->industry=="3" ? 'selected' : ''}}>ICT / Telecommunications </option>
                                            <option value="4" {{Auth::guard('admin')->user()->industry=="4" ? 'selected' : ''}}>Oil &amp; Gas / Mining </option>
                                            <option value="5" {{Auth::guard('admin')->user()->industry=="5" ? 'selected' : ''}}>FMCG / Conglomerate</option>
                                            <option value="6" {{Auth::guard('admin')->user()->industry=="6" ? 'selected' : ''}}>Government Agencies</option>
                                            <option value="7" {{Auth::guard('admin')->user()->industry=="7" ? 'selected' : ''}}>Food Services &amp; Beverages</option>
                                            <option value="8" {{Auth::guard('admin')->user()->industry=="8" ? 'selected' : ''}}>Hospitality / Leisure</option>
                                            <option value="9" {{Auth::guard('admin')->user()->industry=="9" ? 'selected' : ''}}>NGO / International Agencies </option>
                                            <option value="10" {{Auth::guard('admin')->user()->industry=="10" ? 'selected' : ''}}>Legal/ Law</option>
                                            <option value="11" {{Auth::guard('admin')->user()->industry=="11" ? 'selected' : ''}}>Logistics / Transportation </option>
                                            <option value="12" {{Auth::guard('admin')->user()->industry=="12" ? 'selected' : ''}}>Construction / Real Estate</option>
                                            <option value="13" {{Auth::guard('admin')->user()->industry=="13" ? 'selected' : ''}}>Engineering / Maritime</option>
                                            <option value="14" {{Auth::guard('admin')->user()->industry=="14" ? 'selected' : ''}}>Agriculture</option>
                                            <option value="15" {{Auth::guard('admin')->user()->industry=="15" ? 'selected' : ''}}>Consulting</option>
                                            <option value="16" {{Auth::guard('admin')->user()->industry=="16" ? 'selected' : ''}}>Advertising / Media</option>
                                            <option value="17" {{Auth::guard('admin')->user()->industry=="17" ? 'selected' : ''}}>Education Services / Research</option>
                                            <option value="18" {{Auth::guard('admin')->user()->industry=="18" ? 'selected' : ''}}>Manufacturing / Production</option>
                                            <option value="19" {{Auth::guard('admin')->user()->industry=="19" ? 'selected' : ''}}>Ecommerce / Retail / Wholesales</option>
                                            <option value="20" {{Auth::guard('admin')->user()->industry=="20" ? 'selected' : ''}}>Trade / Services</option>
                                            <option value="21" {{Auth::guard('admin')->user()->industry=="21" ? 'selected' : ''}}>Security Agencies</option>
                                            <option value="22" {{Auth::guard('admin')->user()->industry=="22" ? 'selected' : ''}}>Beverages / Drinks</option>
                                            <option value="23" {{Auth::guard('admin')->user()->industry=="2" ? 'selected' : ''}}>Art / Design</option>
                                            <option value="24" {{Auth::guard('admin')->user()->industry=="24" ? 'selected' : ''}}>Fashion / Clothings</option>
                                            <option value="25" {{Auth::guard('admin')->user()->industry=="25" ? 'selected' : ''}}>Energy / Power </option>
                                            <option value="26" {{Auth::guard('admin')->user()->industry=="26" ? 'selected' : ''}}>Automotive / Car Services</option>
                                            <option value="27" {{Auth::guard('admin')->user()->industry=="27" ? 'selected' : ''}}>Gaming / Sports</option>
                                            <option value="28" {{Auth::guard('admin')->user()->industry=="28" ? 'selected' : ''}}>Staffing &amp; Employment Agencies</option>
                                            <option value="29"{{Auth::guard('admin')->user()->industry=="29" ? 'selected' : ''}} >Others</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>No. of Employees <span class="required">*</span></label>
                                            <select name="noEmployee" required aria-invalid="true" class="form-control">
                                                <option value="">Number Of Employees</option>
                                            <option value="1-4" {{Auth::guard('admin')->user()->noEmployee=="1-4" ? 'selected' : ''}}>1-4</option>
                                            <option value="5-10"{{Auth::guard('admin')->user()->noEmployee=="5-10" ? 'selected' : ''}} >5-10</option>
                                            <option value="11-25" {{Auth::guard('admin')->user()->noEmployee=="11-25" ? 'selected' : ''}}>11-25</option>
                                            <option value="26-50" {{Auth::guard('admin')->user()->noEmployee=="26-50" ? 'selected' : ''}}>26-50</option>
                                            <option value="51-100" {{Auth::guard('admin')->user()->noEmployee=="51-100" ? 'selected' : ''}}>51-100</option>
                                            <option value="101-200" {{Auth::guard('admin')->user()->noEmployee=="101-200" ? 'selected' : ''}}>101-200</option>
                                            <option value="201-500" {{Auth::guard('admin')->user()->noEmployee=="201-500" ? 'selected' : ''}}>201-500</option>
                                            <option value="501-1000" {{Auth::guard('admin')->user()->noEmployee=="501-1000" ? 'selected' : ''}}>501-1000</option>
                                            <option value="1001+" {{Auth::guard('admin')->user()->noEmployee=="1001+" ? 'selected' : ''}}>1001+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>City: <span class="required">*</span></label>
                                            <input type="text" placeholder="City Company is Located" name="city" class="form-control" value="{{Auth::guard('admin')->user()->city}}" required>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Local Government Area: <span class="required">*</span></label>
                                            <select name="lga" required class="form-control">
                                            <option value="">Select L.G.A</option>
                                                <option value="Aboh-Mbaise"  {{Auth::guard('admin')->user()->lga=="Aboh-Mbaise" ? 'selected' : ''}}>Aboh-Mbaise</option>
                                                <option value="Ahiazu-Mbaise">Ahiazu-Mbaise</option>
                                                <option value="Ehime-Mbano" {{Auth::guard('admin')->user()->lga=="Ehime-Mbano" ? 'selected' : ''}}>Ehime-Mbano</option>
                                                <option value="Ezinihitte" {{Auth::guard('admin')->user()->lga=="Ezinihitte" ? 'selected' : ''}}>Ezinihitte</option>
                                                <option value="Ideato North" {{Auth::guard('admin')->user()->lga=="Ideato North" ? 'selected' : ''}}>Ideato North</option>
                                                <option value="Ideato South" {{Auth::guard('admin')->user()->lga=="Ideato South" ? 'selected' : ''}}>Ideato South</option>
                                                <option value="Ihitte/Uboma" {{Auth::guard('admin')->user()->lga=="Ihitte/Uboma" ? 'selected' : ''}}>Ihitte/Uboma</option>
                                                <option value="Ikeduru" {{Auth::guard('admin')->user()->lga=="Ikeduru" ? 'selected' : ''}}>Ikeduru</option>
                                                <option value="Isiala Mbano" {{Auth::guard('admin')->user()->lga=="Isiala Mbano" ? 'selected' : ''}}>Isiala Mbano</option>
                                                <option value="Isu">Isu</option>
                                                <option value="Mbaitoli" {{Auth::guard('admin')->user()->lga=="Mbaitoli" ? 'selected' : ''}}>Mbaitoli</option>
                                                <option value="Ngor-Okpala" {{Auth::guard('admin')->user()->lga=="Ngor-Okpala" ? 'selected' : ''}}>Ngor-Okpala</option>
                                                <option value="Njaba" {{Auth::guard('admin')->user()->lga=="Njaba" ? 'selected' : ''}}>Njaba</option>
                                                <option value="Nwangele" {{Auth::guard('admin')->user()->lga=="Nwangele" ? 'selected' : ''}}>Nwangele</option>
                                                <option value="Nkwerre" {{Auth::guard('admin')->user()->lga=="Nkwerre" ? 'selected' : ''}}>Nkwerre</option>
                                                <option value="Obowo" {{Auth::guard('admin')->user()->lga=="Obowo" ? 'selected' : ''}}>Obowo</option>
                                                <option value="Oguta" {{Auth::guard('admin')->user()->lga=="Oguta" ? 'selected' : ''}}>Oguta</option>
                                                <option value="Ohaji/Egbema" {{Auth::guard('admin')->user()->lga=="Ohaji/Egbema" ? 'selected' : ''}}>Ohaji/Egbema</option>
                                                <option value="Okigwe" {{Auth::guard('admin')->user()->lga=="Okigwe" ? 'selected' : ''}}>Okigwe</option>
                                                <option value="Orlu" {{Auth::guard('admin')->user()->lga=="Orlu" ? 'selected' : ''}}>Orlu</option>
                                                <option value="Orsu" {{Auth::guard('admin')->user()->lga=="Orsu" ? 'selected' : ''}}>Orsu</option>
                                                <option value="Oru East" {{Auth::guard('admin')->user()->lga=="Oru East" ? 'selected' : ''}}>Oru East</option>
                                               
                                                
                                                <option value="Owerri-Municipal" {{Auth::guard('admin')->user()->lga == 'Owerri-Municipal' ? 'selected' : ''}} >Owerri-Municipal</option>
                                                
                                                <option value="Owerri North" {{Auth::guard('admin')->user()->lga == "Owerri North" ? 'selected' : ''}} >Owerri North</option>
                                                
                                                <option value="Owerri West" {{Auth::guard('admin')->user()->lga=='Owerri West' ? 'selected' : ''}} >Owerri West</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Country: <span class="required">*</span></label>
                                            <input type="text" placeholder="Country" name="country"  value="{{Auth::guard('admin')->user()->country}}" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                          <label>Company Logo: <span class="required">*</span></label>
                                        <div class="input-group image-preview form-group">
                                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="file_extension" name="logo" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Phone: <span class="required">*</span></label>
                                            <input type="text" placeholder="Company Phone Number"  value="{{Auth::guard('admin')->user()->phone}}" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Website: <span class="required">*</span></label>
                                            <input type="url" required placeholder="Enter Website"  value="{{Auth::guard('admin')->user()->website}}" name="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" placeholder="Company address" name="address" class="form-control"  value="{{Auth::guard('admin')->user()->address}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>About Company <span class="required">*</span></label>
                                            <textarea cols="6" name="about" rows="8" placeholder="Brief Summary About Your Company" class="form-control" required> {{Auth::guard('admin')->user()->about}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                         <button class="btn btn-default pull-right" type="submit"> Save Profile <i class="fa fa-angle-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection