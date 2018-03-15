 
    <nav id="menu-1" class="mega-menu fa-change-black"> 
        <section class="menu-list-items container"> 
            <ul class="menu-logo">
                <li> <a href="{{route('home')}}"> <img src={{URL::to("images/logo.png")}} alt="logo" class="img-responsive"  style="padding-bottom:0px;height:50px;width:70px"> </a> </li>
            </ul>
            
          
                   
            
            <ul class="menu-links pull-right">
           
                              <li class="profile-pic">
                        <a href="javascript:void(0)"> <span class="hidden-xs hidden-sm">{{Auth::guard('ad')->user()->name}}  </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                          
                        <!--    <li><a href="#"><i class="fa fa-mail-forward"></i> Inbox</a></li> -->
                          
                            <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
               

            </ul>
        </section>
    </nav>


    