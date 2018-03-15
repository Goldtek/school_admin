
    <nav id="menu-1" class="mega-menu fa-change-black"> 
        <section class="menu-list-items container"> 
            <div class="col-md-2 col-sm-3 col-xs-12">
                <ul class="menu-logo">
                    <li> <a href="{{route('home')}}"> <img src={{URL::to("images/logo.png")}} alt="logo" class="img-responsive" style="height:50px;width:95;padding-bottom:0px;"> </a> </li>
                </ul>
            </div>
           <div class="col-md-4 col-sm-5 col-xs-12">
               
             </div>
                   
         <div class="col-md-6 col-sm-4 col-xs-12">
            <ul class="menu-links pull-right">
            
                <li> <a href="{{route('home')}}"> Home </a> </li>
                     
                @if(Auth::guard('admin')->check() || Auth::check())
                        @if(Auth::guard('admin')->check())
                              <li class="profile-pic">
                        <a href="javascript:void(0)"> <span class="hidden-xs hidden-sm">{{Auth::guard('admin')->user()->sname}} {{Auth::guard('admin')->user()->fname}} </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                         
                        <!--    <li><a href="#"><i class="fa fa-mail-forward"></i> Inbox</a></li> -->
                            <li><a href=""><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="{{route('company.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
               
                            @else
                  <li class="profile-pic">
                        <a href="javascript:void(0)"> <span class="hidden-xs hidden-sm">{{Auth::user()->sname}} {{Auth::user()->fname}} </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="{{route('courses')}}"><i class="fa fa-book"></i> My Courses</a></li>
                          <!--  <li><a href="#"><i class="fa fa-mail-forward"></i> Inbox</a></li> -->
                            <li><a href=""><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="{{route('auth.user.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
                
                @else
                <li><a href="javascript:void(0)"> <i class="fa fa-users"></i> My Account  <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <ul class="drop-down-multilevel">
                 <li><a href="{{route('auth.user.login')}}"> <i class="fa fa-sign-in"></i>  Login</a></li>
                 
                    </ul>
                </li>
                
          
               
                <li ><a href="javascript:void(0)" class="p-job"><i class="fa fa-user"></i> Admin<i class="fa fa-angle-down fa-indicator"></i></a>
                    
                    <ul class="drop-down-multilevel">
                 <li><a href="{{route('admin.login')}}"> <i class="fa fa-sign-in"></i>  Login</a></li>
                 
                    </ul>
                </li>
                
                @endif
                
                
              
            </ul>
        </div>
        </section>
    </nav>


    