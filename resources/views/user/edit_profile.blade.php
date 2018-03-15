 @extends('layouts.master')
@section('title')
User Dashboard
@endsection

@section('content')

<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit profile</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">edit profile</li>
                            </ol>
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
                            <div class="profile-card">
                                <div class="banner">
                                    <img src={{URL::to("images/polygons-1.png")}} alt="" class="img-responsive">
                                </div>
                                <div class="user-image">
                                    <img src={{URL::to(Auth::user()->image)}} class="img-responsive img-circle" alt="">
                                </div>
                                <div class="card-body">
                                    <h3>{{Auth::user()->Fullname()}}</h3>
                                    <span class="title">{{strtoupper(Auth::user()->job)}}</span>
                                </div>
                                <div class="col-md-12 well picturebox" style="display:none">
                                <form action="{{route('user.updatePix')}}" method="post" enctype="multipart/form-data">
                                    <div class="col-md-8"><label>Change Profile Image</label></div>
                                       <div class="col-md-12 col-sm-12">
                                        <div class="input-group image-preview form-group">
                                          <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="image" accept="file_extension" name="input-file-preview" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pull-right col-md-6">
                                    <button class="btn btn-primary fa fa-upload" type="submit">  Upload Image</button>
                                    </div> {{csrf_field()}}
                                    </form>
                                </div>
                               <div class="col-md-offset-3">
                                    <a href="#" class="btn btn-primary Pix" data-tooltip="true" data-toggle="modal" data-placement="left" title="Change Profile Picture" ><i class="fa fa-user"></i> Update Profile Picture</a>
                                </div>  
                          
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                 <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="{{route('user.dashboard')}}"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li class="active">
                                            <a href="{{route('user.edit_profile')}}"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.build_resume')}}"> <i class="fa fa-file-o"></i>Build Resume </a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.resume')}}"> <i class="fa fa-file-o"></i>Saved Resume </a>
                                        </li>
                                      <li>
                                            <a href="{{route('user.post')}}"> <i class="fa fa-file-o"></i>Post Freelance Job </a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.jobs')}}"> <i class="fa  fa-list-ul"></i> Jobs Applied</a>
                                        </li>
                                      <li>
                                            <a href="{{route('freelancer.viewCv')}}"> <i class="fa  fa-user"></i> View Freelancers Resume </a>
                                        </li> 
                                        <li>
                                            <a href="{{route('user.company')}}"> <i class="fa  fa-bookmark-o"></i> Followed Companies </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="heading-inner first-heading">
                                <p class="title">Edit Profile</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="profile-edit row">
                                    <form action="{{route('user.update',['id'=>Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name <span class="required">*</span></label>
                                                <input type="text" placeholder="" name="fname" class="form-control" value="{{Auth::user()->fname}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" placeholder="" name="sname" class="form-control" value="{{Auth::user()->sname}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                         
                                                <label>Date Of Birth <span class="required">*</span></label>
                                              
                                            
                                               <div class="input-group date" id="datetimepicker1">
                                <span class="input-group-addon"> <span class="glyphicon-calendar glyphicon"></span> </span> 
                                                   <input type="text" id="dob" class="form-control"  name="dob" placeholder="Enter Date Of birth" value="{{Auth::user()->dob}}" ></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="email" disabled placeholder="" class="form-control" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>City <span class="required">*</span></label>
                                                <input type="text" name="city" placeholder="Enter City" class="form-control" value="{{Auth::user()->city}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Country <span class="required">*</span></label>
                                                <input type="text" name="country" placeholder="Enter Country" class="form-control" value="{{Auth::user()->country}}">
                                            </div>
                                        </div> 
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Address <span class="required">*</span></label>
                                                <input type="text" name="address" placeholder="Enter Address" class="form-control" value="{{Auth::user()->address}}">
                                            </div>
                                        </div>
                                          <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Desired Job <span class="required">*</span></label>
                                                <input type="text" name="job" placeholder="Enter Desired Job Role/Profession" class="form-control" value="{{Auth::user()->job}}">
                                            </div>
                                        </div>
                                        
                                       <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Desired Industry <span class="required">*</span></label>
                                                <select name="industry" required class="form-control">
                                            <option value="" selected="selected">Select Industry</option>
                                          <option value="1" {{Auth::user()->industry=="1" ? 'selected' : ''}}>Banking / Financial Services</option>
                                            <option value="2"{{Auth::user()->industry=="2" ? 'selected' : ''}} >Healthcare / Nutrition</option>
                                            <option value="3" {{Auth::user()->industry=="3" ? 'selected' : ''}}>ICT / Telecommunications </option>
                                            <option value="4" {{Auth::user()->industry=="4" ? 'selected' : ''}}>Oil &amp; Gas / Mining </option>
                                            <option value="5" {{Auth::user()->industry=="5" ? 'selected' : ''}}>FMCG / Conglomerate</option>
                                            <option value="6" {{Auth::user()->industry=="6" ? 'selected' : ''}}>Government Agencies</option>
                                            <option value="7" {{Auth::user()->industry=="7" ? 'selected' : ''}}>Food Services &amp; Beverages</option>
                                            <option value="8" {{Auth::user()->industry=="8" ? 'selected' : ''}}>Hospitality / Leisure</option>
                                            <option value="9" {{Auth::user()->industry=="9" ? 'selected' : ''}}>NGO / International Agencies </option>
                                            <option value="10" {{Auth::user()->industry=="10" ? 'selected' : ''}}>Legal/ Law</option>
                                            <option value="11" {{Auth::user()->industry=="11" ? 'selected' : ''}}>Logistics / Transportation </option>
                                            <option value="12" {{Auth::user()->industry=="12" ? 'selected' : ''}}>Construction / Real Estate</option>
                                            <option value="13" {{Auth::user()->industry=="13" ? 'selected' : ''}}>Engineering / Maritime</option>
                                            <option value="14" {{Auth::user()->industry=="14" ? 'selected' : ''}}>Agriculture</option>
                                            <option value="15" {{Auth::user()->industry=="15" ? 'selected' : ''}}>Consulting</option>
                                            <option value="16" {{Auth::user()->industry=="16" ? 'selected' : ''}}>Advertising / Media</option>
                                            <option value="17" {{Auth::user()->industry=="17" ? 'selected' : ''}}>Education Services / Research</option>
                                            <option value="18" {{Auth::user()->industry=="18" ? 'selected' : ''}}>Manufacturing / Production</option>
                                            <option value="19" {{Auth::user()->industry=="19" ? 'selected' : ''}}>Ecommerce / Retail / Wholesales</option>
                                            <option value="20" {{Auth::user()->industry=="20" ? 'selected' : ''}}>Trade / Services</option>
                                            <option value="21" {{Auth::user()->industry=="21" ? 'selected' : ''}}>Security Agencies</option>
                                            <option value="22" {{Auth::user()->industry=="22" ? 'selected' : ''}}>Beverages / Drinks</option>
                                            <option value="23" {{Auth::user()->industry=="2" ? 'selected' : ''}}>Art / Design</option>
                                            <option value="24" {{Auth::user()->industry=="24" ? 'selected' : ''}}>Fashion / Clothings</option>
                                            <option value="25" {{Auth::user()->industry=="25" ? 'selected' : ''}}>Energy / Power </option>
                                            <option value="26" {{Auth::user()->industry=="26" ? 'selected' : ''}}>Automotive / Car Services</option>
                                            <option value="27" {{Auth::user()->industry=="27" ? 'selected' : ''}}>Gaming / Sports</option>
                                            <option value="28" {{Auth::user()->industry=="28" ? 'selected' : ''}}>Staffing &amp; Employment Agencies</option>
                                            <option value="29"{{Auth::user()->industry=="29" ? 'selected' : ''}} >Others</option>
                                            </select>
                                        </div>
                                        </div>
                                        
                                       <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Expected Salary <span class="required">*</span></label>
                                                <select name="salary" class="form-control" required>
                                                <option value="">Select Salary Level</option>
                                                <option value="1" {{Auth::user()->salary=="1" ? 'selected' : ''}}>Below 75,000</option>
                                                <option value="2" {{Auth::user()->salary=="2" ? 'selected' : ''}}>N75,000 - N150,000</option>
                                                <option value="3" {{Auth::user()->salary=="3" ? 'selected' : ''}}>N150,000 - N250,000</option>
                                                <option value="4" {{Auth::user()->salary=="4" ? 'selected' : ''}}>N250,000 - N400,000</option>
                                                <option value="5" {{Auth::user()->salary=="5" ? 'selected' : ''}}>N400,000 - N600,000</option>
                                                <option value="6" {{Auth::user()->salary=="6" ? 'selected' : ''}}>N600,000 - N900,000</option>
                                                <option value="7" {{Auth::user()->salary=="7" ? 'selected' : ''}}>N900,000 - N1,200,000</option>
                                                <option value="8" {{Auth::user()->salary=="8" ? 'selected' : ''}}>N1,200,000 - N1,500,000</option>
                                                <option value="9" {{Auth::user()->salary=="9" ? 'selected' : ''}} >N1,500,000 - N2,000,000</option>
                                                <option value="10" {{Auth::user()->salary=="10" ? 'selected' : ''}}>N2,000,000 - N3,000,000</option>
                                                <option value="11" {{Auth::user()->salary=="11" ? 'selected' : ''}}>N3,000,000 - N4,000,000</option>
                                                <option value="12" {{Auth::user()->salary=="12" ? 'selected' : ''}}>N4,000,000 - N5,000,000</option>
                                                <option value="13" {{Auth::user()->salary=="13" ? 'selected' : ''}}>Above N5,000,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                          
                                       <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Highest Level OF Education <span class="required">*</span></label>
                                                <select name="hedu" class="form-control" required>
                                        <option value="1" {{Auth::user()->hedu=="1" ? 'selected' : ''}}>Advanced Diploma</option>
                                        <option value="2" {{Auth::user()->hedu=="2" ? 'selected' : ''}}>Associate Degree</option>
                                        <option value="3" {{Auth::user()->hedu=="3" ? 'selected' : ''}}>Associate of Science</option>
                                        <option value="4" {{Auth::user()->hedu=="4" ? 'selected' : ''}}>Bachelor of Arts</option>
                                        <option value="5" {{Auth::user()->hedu=="5" ? 'selected' : ''}}>Bachelor of Business</option>
                                        <option value="6" {{Auth::user()->hedu=="6" ? 'selected' : ''}}>Bachelor of Education</option>
                                        <option value="7" {{Auth::user()->hedu=="7" ? 'selected' : ''}}>Bachelor of Engineering</option>
                                        <option value="8" {{Auth::user()->hedu=="8" ? 'selected' : ''}}>Bachelor of Law</option>
                                        <option value="9" {{Auth::user()->hedu=="9" ? 'selected' : ''}}>Bachelor of Science</option>
                                        <option value="10" {{Auth::user()->hedu=="10" ? 'selected' : ''}}>Bachelor of Technology</option>
                                        <option value="11" {{Auth::user()->hedu=="11" ? 'selected' : ''}}>Call To Bar</option>
                                        <option value="12" {{Auth::user()->hedu=="12" ? 'selected' : ''}}>Vocational</option>
                                        <option value="13" {{Auth::user()->hedu=="13" ? 'selected' : ''}}>City and Guilds Certificate</option>
                                        <option value="14" {{Auth::user()->hedu=="14" ? 'selected' : ''}}>Diploma</option>
                                        <option value="15" {{Auth::user()->hedu=="15" ? 'selected' : ''}}>Doctorate Degree(P.HD)</option>
                                        <option value="16" {{Auth::user()->hedu=="16" ? 'selected' : ''}}>Executive Masters</option>
                                        <option value="17" {{Auth::user()->hedu=="17" ? 'selected' : ''}}>Fellow</option>
                                        <option value="18" {{Auth::user()->hedu=="18" ? 'selected' : ''}}>First School Leaving Certificate</option>
                                        <option value="19"  {{Auth::user()->hedu=="19" ? 'selected' : ''}}>Full Technological </option>
                                        <option value="20"  {{Auth::user()->hedu=="20" ? 'selected' : ''}}>GCE</option>
                                        <option value="21"  {{Auth::user()->hedu=="21" ? 'selected' : ''}}>Grade II Certificate</option>
                                        <option value="22"  {{Auth::user()->hedu=="22" ? 'selected' : ''}}>Higher Diploma</option>
                                        <option value="23"  {{Auth::user()->hedu=="23" ? 'selected' : ''}}>Higher National Diploma(HND)</option>
                                        <option value="24"  {{Auth::user()->hedu=="24" ? 'selected' : ''}}>Higher School Certificate</option>
                                        <option value="25"  {{Auth::user()->hedu=="25" ? 'selected' : ''}}>Institute of Charter</option>
                                        <option value="26"  {{Auth::user()->hedu=="26" ? 'selected' : ''}}>Master in Public Admin</option>
                                        <option value="27"  {{Auth::user()->hedu=="27" ? 'selected' : ''}}>Master in Technology</option>
                                        <option value="28"  {{Auth::user()->hedu=="28" ? 'selected' : ''}}>Master of Arts (M.A)</option>
                                        <option value="29"  {{Auth::user()->hedu=="29" ? 'selected' : ''}}>Masters in Bus Admin (MBA)</option>
                                        <option value="30"  {{Auth::user()->hedu=="30" ? 'selected' : ''}}>Masters in Engineering</option>
                                        <option value="31"  {{Auth::user()->hedu=="31" ? 'selected' : ''}}></option>
                                        <option value="32"  {{Auth::user()->hedu=="32" ? 'selected' : ''}}>Masters in Philosophy</option>
                                        <option value="33"  {{Auth::user()->hedu=="33" ? 'selected' : ''}}>Masters of Science</option>
                                        <option value="34"  {{Auth::user()->hedu=="34" ? 'selected' : ''}}>MBBS</option>
                                        <option value="35"  {{Auth::user()->hedu=="35" ? 'selected' : ''}}>Modern II Certificate</option>
                                        <option value="36"  {{Auth::user()->hedu=="36" ? 'selected' : ''}}>Modern III Certificate</option>
                                        <option value="37"  {{Auth::user()->hedu=="37" ? 'selected' : ''}}>Modern School Leaving Certificate</option>
                                        <option value="38"  {{Auth::user()->hedu=="38" ? 'selected' : ''}}>National Certificate of Education (NCE)</option>
                                        <option value="39"  {{Auth::user()->hedu=="39" ? 'selected' : ''}}>National Diploma (ND)</option>
                                        <option value="40"  {{Auth::user()->hedu=="40" ? 'selected' : ''}}>National Postgraduate</option>
                                        <option value="41"  {{Auth::user()->hedu=="41" ? 'selected' : ''}}>NSE Graduate</option>
                                        <option value="42"  {{Auth::user()->hedu=="42" ? 'selected' : ''}}>Ordinary National Diploma (OND)</option>
                                        <option value="43"  {{Auth::user()->hedu=="43" ? 'selected' : ''}}>Other Qualification</option>
                                        <option value="44"  {{Auth::user()->hedu=="44" ? 'selected' : ''}}>Post Graduate Certificate</option>
                                        <option value="45"  {{Auth::user()->hedu=="45" ? 'selected' : ''}}>Post Graduate Diploma (PGD)</option>
                                        <option value="46"  {{Auth::user()->hedu=="46" ? 'selected' : ''}}>Professional Diploma</option>
                                        <option value="47"  {{Auth::user()->hedu=="47" ? 'selected' : ''}}>Registered Midwife</option>
                                        <option value="48"  {{Auth::user()->hedu=="48" ? 'selected' : ''}}>Registered Nurse</option>
                                        <option value="49"  {{Auth::user()->hedu=="49" ? 'selected' : ''}}>Registered Surveyor</option>
                                        <option value="50"  {{Auth::user()->hedu=="50" ? 'selected' : ''}}>Secretarial</option>
                                        <option value="51"  {{Auth::user()->hedu=="51" ? 'selected' : ''}}>Senior School Certificate Exam (SSCE)</option>
                                        <option value="52"  {{Auth::user()->hedu=="52" ? 'selected' : ''}}>Tech. Teachers Cert.</option>
                                        <option value="53"  {{Auth::user()->hedu=="53" ? 'selected' : ''}}>Trade Test Certificate (TTC)</option>
                                        <option value="54"  {{Auth::user()->hedu=="54" ? 'selected' : ''}}>WASC</option>
                                        <option value="55"  {{Auth::user()->hedu=="55" ? 'selected' : ''}}>West African Postgrd Med</option>
                                        </select>
                                           </div>
                                        </div>
                                       
                                          <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Level<span class="required">*</span></label>
                                                <select name="joblevel" class="form-control" required>
                                                    <option value="">Select</option>
                                                     <option value="1"  {{Auth::user()->joblevel=="1" ? 'selected' : ''}}>Vocational/Semi-Skilled/Unskilled Labour</option>
                                                   <option value="2" {{Auth::user()->joblevel=="2" ? 'selected' : ''}}> Undergraduate Internship/Vacation Job</option>
                                                    <option value="3" {{Auth::user()->joblevel=="3" ? 'selected' : ''}}>Fresh Graduate/Entry Level/Graduate Internship</option>
                                                    <option value="4" {{Auth::user()->joblevel=="4" ? 'selected' : ''}}>Experienced (Non-Manager) </option>
                                                  <option value="5" {{Auth::user()->joblevel=="5" ? 'selected' : ''}}>  Manager (Staff Supervisor/Head of Department)</option>
                                                  <option value="6" {{Auth::user()->joblevel=="6" ? 'selected' : ''}}>  Executive (Director/CEO/CFO/COO)</option>
                                                </select>
                                              </div>
                                        </div>
                                        
                                 <div class="col-md-6 col-sm-12">
                                      <label>Years of Experience<span>*</span></label>
                                        <select name="experience" class="form-control">
                                            <option value="0" {{Auth::user()->experience=="0" ? 'selected' : ''}}>0</option>
                                            <option value="1" {{Auth::user()->experience=="1" ? 'selected' : ''}}>1</option>
                                            <option value="2" {{Auth::user()->experience=="2" ? 'selected' : ''}}>2</option>
                                            <option value="3" {{Auth::user()->experience=="3" ? 'selected' : ''}}> 3</option>
                                            <option value="4" {{Auth::user()->experience=="4" ? 'selected' : ''}}>4</option>
                                            <option value="5" {{Auth::user()->experience=="5" ? 'selected' : ''}}>5</option>
                                            <option value="6" {{Auth::user()->experience=="6" ? 'selected' : ''}}>6</option>
                                            <option value="7" {{Auth::user()->experience=="7" ? 'selected' : ''}}>7</option>
                                            <option value="8" {{Auth::user()->experience=="8" ? 'selected' : ''}}>8</option>
                                            <option value="9" {{Auth::user()->experience=="9" ? 'selected' : ''}}>9</option>
                                            <option value="10" {{Auth::user()->experience=="10" ? 'selected' : ''}}>10</option>
                                            <option value="11" {{Auth::user()->experience=="11" ? 'selected' : ''}}>11</option>
                                            <option value="12" {{Auth::user()->experience=="12" ? 'selected' : ''}}>12</option>
                                            <option value="13" {{Auth::user()->experience=="13" ? 'selected' : ''}}>13</option>
                                            <option value="14" {{Auth::user()->experience=="14" ? 'selected' : ''}}>14</option>
                                            <option value="15" {{Auth::user()->experience=="15" ? 'selected' : ''}}>15</option>
                                            <option value="16" {{Auth::user()->experience=="16" ? 'selected' : ''}}>16</option>
                                            <option value="17" {{Auth::user()->experience=="17" ? 'selected' : ''}}>17</option>
                                            <option value="18" {{Auth::user()->experience=="18" ? 'selected' : ''}}>18</option>
                                            <option value="19" {{Auth::user()->experience=="19" ? 'selected' : ''}}>19</option>
                                            <option value="20" {{Auth::user()->experience=="20" ? 'selected' : ''}}>20</option>
                                            <option value="21" {{Auth::user()->experience=="21" ? 'selected' : ''}}>21</option>
                                            <option value="22" {{Auth::user()->experience=="22" ? 'selected' : ''}}>22</option>
                                            <option value="23" {{Auth::user()->experience=="23" ? 'selected' : ''}}>23</option>
                                            <option value="24" {{Auth::user()->experience=="24" ? 'selected' : ''}}>24</option>
                                            <option value="25" {{Auth::user()->experience=="25" ? 'selected' : ''}}>25</option>
                                            <option value="26" {{Auth::user()->experience=="26" ? 'selected' : ''}}>26</option>
                                            <option value="27" {{Auth::user()->experience=="27" ? 'selected' : ''}}>27</option>
                                            <option value="28" {{Auth::user()->experience=="28" ? 'selected' : ''}}>28</option>
                                            <option value="29" {{Auth::user()->experience=="29" ? 'selected' : ''}}>29</option>
                                            <option value="30" {{Auth::user()->experience=="30" ? 'selected' : ''}}>30</option>
                                            <option value="31" {{Auth::user()->experience=="31" ? 'selected' : ''}}>31</option>
                                            <option value="32" {{Auth::user()->experience=="32" ? 'selected' : ''}}>32</option>
                                            <option value="33" {{Auth::user()->experience=="33" ? 'selected' : ''}}>33</option>
                                            <option value="34" {{Auth::user()->experience=="34" ? 'selected' : ''}}>34</option>
                                            <option value="35" {{Auth::user()->experience=="35" ? 'selected' : ''}}>35</option>
                                            <option value="36" {{Auth::user()->experience=="36" ? 'selected' : ''}}>36</option>
                                            <option value="37" {{Auth::user()->experience=="37" ? 'selected' : ''}}>37</option>
                                            <option value="38" {{Auth::user()->experience=="38" ? 'selected' : ''}}>38</option>
                                            <option value="39" {{Auth::user()->experience=="39" ? 'selected' : ''}}>39</option>
                                            </select>
                                                            </div>
                                        
                                        <div class="col-md-12 col-sm-12 ">
                                          <label>Upload Your CV: <span class="required">*</span></label>
                                        <div class="input-group image-preview form-group">
                                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="file_extension" name="cv" />
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                        
                                        
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>About yourSelf <span class="required">*</span></label>
                                 <textarea cols="6" rows="8" name="about" placeholder="Write About yourself" class="form-control" required> {{Auth::user()->about}} </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                    </div>
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <button type="submit" class="btn btn-default pull-right"> Save Profile <i class="fa fa-angle-right"></i></button>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                             
                         
               
@endsection

@section('footer')

<!-- FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>
        <script type="text/javascript" src={{URL::to("js/map.js")}}></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>
<script>
		$(document).ready(function(e){
		
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
        