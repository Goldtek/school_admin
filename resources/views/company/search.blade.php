 <!--begin of loop -->

                       @foreach($users as $user)        
                             <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src={{URL::to($user->image)}} alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href=""> {{$user->sname}} {{$user->fname}} </a></h1>
                                            <h3> {{$user->job}} </h3>
                                            <p class="bio"><b>Year Of Experience: </b>@if(!empty($user->experience)) {{$user->experience}} Years @endif</p>
                                            <div class="profile-skills" style="font-size:16px">
                                            	<b>Highest Education:</b> @foreach($hedu as $he)
                                        @if($he->id==$user->hedu)
                                        {{$he->name}}
                                        @endif
                                            @endforeach
                                            </div>
                                            <div class="view-btn">  <!-- data-target="#myModal" data-toggle="modal" -->
                                            	<a  class="btn-default btn-xs showmessage" style="padding-left:5px; cursor:pointer" userid="{{$user->id}}" name="{{$user->sname}} {{$user->fname}}"><i class="fa fa-user" ></i> View Profile</a>
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="javascript:;"   user_id="{{$user->id}}" class="btn-default hire1" > <i class="fa fa-location-arrow"></i> Short List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                @endforeach

                            {!! $users->links() !!}
  <!-- end of loop -->
                
                        <div  class="modal fade myModal" role="dialog" style="">
                        <div class="modal-dialog"> 
                             
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header rte">
                                    <h2 class="modal-title" id="mname"></h2>
                                </div>
                                <div class="modal-body" id="mode9">
                                    
                                     @if(!empty($User))
                                     @include('company.search')
                                    @endif
                                </div>
                                <div class="modal-footer">
                                   	<a href="javascript:;" user_id="" class="btn btn-primary fa fa-location-arrow hire2" >    Shorlist </a>
                                    <button type="button" class="btn btn-danger fa fa-close" data-dismiss="modal">    Close</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                       <script>
                           $(document).ready(function(e){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                        $('.showmessage').click(function(e){
                                var m = $(this).attr('userid'),
                                 name = $(this).attr('name');
                            
                             $.ajax({
                             type:'GET',
                             url:"{{route('company.modal')}}",
                             data:{m:m},
                             dataType:'html',
                             success:function(data){
                        $("#mode9").html(data);
                                 $('#mname').html(name);
                                  $(".hire2").attr("user_id", m);
                                 $('.myModal').modal('show');
                             },error:function(err){
                                 console.log(err.responseText);
                             }
                         });
  
                                });     
                                });   
                       
                           
                           
                           $('.hire1').click(function(e){
                                 var id = $(this).attr('user_id');
                          //submit details to db
                                 $.ajax({
                             type:'GET',
                             url:"{{route('shortlist')}}",
                             data:{id:id},
                             dataType:'html',
                             success:function(data){
                               //  display success message
                                 bootbox.alert(data);
                             },error:function(err){
                                 console.log(err.responseText);
                             }
                         });
                               
                           });
                           
                           $('.hire2').click(function(e){
                                 var id = $(this).attr('user_id');
                           // submit details to db
                               
                                 $.ajax({
                             type:'GET',
                             url:"{{route('shortlist')}}",
                             data:{id:id},
                             dataType:'html',
                             success:function(data){
                            
                                 
                             },error:function(err){
                                 console.log(err.responseText);
                             }
                         });
                           });

                    </script>   