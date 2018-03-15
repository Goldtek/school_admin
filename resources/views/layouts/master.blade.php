<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<body>
<div class="page">
   @include('partials.navigation')
    <div class="clearfix"></div>
      <div class="search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">By Company</a></li>
                                <li><a href="#">By Function</a></li>
                                <li><a href="#">By City </a></li>
                                <li><a href="#">By Salary </a></li>
                                <li><a href="#">By Industry</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                        </span> </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    
    @include('partials.footer')
    @include('partials.ajax')
    </div>
</body>
</html>
    