                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Personal information </h3>
                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                <table class="table">
                                                    <tr>
                                                    <td style="font-weight:bold">Date of Birth</td>
                                                    <td id="dob"> {{ date("F jS, Y", strtotime( $User->dob))}}  </td>
                                                    </tr>
                                                    <tr>
                                                    <td style="font-weight:bold">Gender</td>
                                                    <td id="gender"> {{$User->gender}}  </td>
                                                    </tr><tr>
                                                    <td style="font-weight:bold">Current Location </td>
                                                    <td id="cstate"> {{$User->city}}</td>
                                                    </tr>                                    
                                                     <tr>
                                                    <td style="font-weight:bold">Nationality</td>
                                                    <td id="nationality"> {{$User->country}}</td>
                                                    </tr>
                                                  </table>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                            
                                            <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Educational Qualifications </h3>
                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                
                                                 <table class="table">
                                                      <tr>
                                                          
                                                    <th>Institution/School</th>
                                                    <th>Qualification</th>
                                                    <th>Grade</th>
                                                    <th>Period</th>
                                                     </tr>
                                                     @foreach($education as $edu)
                                                        <tr>

                                                    <td>{{$edu->institute}}</td>
                                                    <td> {{$edu->qualification}} </td>
                                                        <td>{{$edu->grade}}</td>
                                                        <td>{{date("d-M-Y",strtotime($edu->start))}} - {{date("d-M-Y",strtotime($edu->end))}}</td>

                                                                    </tr>
                                                                 @endforeach   
                                                  </table>
                                                
                                                </div>
                                            </div>
                                        </div> 
                                            
                                            
                                            
                                         <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Career Summary </h3>
                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                
                                                 <table class="table">
                                                    <tr>
                                                    <td style="font-weight:bold">Desired Job</td>
                                                    <td id="djob"> {{$User->job}}  </td>
                                                    </tr>
                                                    <tr>
                                                    <td style="font-weight:bold">Industry</td>
                                                    <td id="ind"> @foreach($industry as $i)
                                                                    @if($i->id==$User->industry)
                                                                    {{$i->name}}
                                                                    @endif
                                                                    @endforeach </td>
                                                    </tr>
                                                     <tr>
                                                    <td style="font-weight:bold">Highest Level of Education </td>
                                                    <td id="hle"> @foreach($highEdu as $he)
                                                                    @if($he->id==$User->hedu)
                                                                    {{$he->name}}
                                                                    @endif
                                                                        @endforeach</td>
                                                    </tr>
                                                    <tr>
                                                    <td style="font-weight:bold">Years of Experience</td>
                                                    <td id="exp"> {{$User->experience}} Years</td>
                                                    </tr><tr>
                                                    <td style="font-weight:bold">Desired Salary</td>
                                                    <td id="dsalary"> @foreach($salaries as $s)
                                                                        @if($s->id==$User->salary)
                                                                        {{$s->name}}
                                                                        @endif
                                                                            @endforeach </td>
                                                    </tr>
                                                  </table>
                                                
                                                </div>
                                            </div>
                                        </div>
                             <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Work Experience </h3>
                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                
                                                 <table class="table">
                                                      <tr>
                                                    <td style="font-weight:bold">Name of Industry</td>
                                                         <td style="font-weight:bold">Position Held </td>
                                                           <td style="font-weight:bold">Period</td>
                                                     </tr>
                                                    @foreach($experiences as $experience)
                                                   <tr>
                                                    <td id="n_indus">{{$experience->companyname}} </td>
                                                    
                                                    <td id="pheld"> {{$experience->experience}} </td>
                                                    
                                                    <td id="dstart"> {{date("d-M-Y",strtotime($experience->start_date))}} - {{date("d-M-Y",strtotime($experience->end_date))}}  </td>
                                                   
                                                    </tr>
                                                 @endforeach   
                                                  </table>
                                                
                                                </div>
                                            </div>
                                        </div> 
                                            
                                            <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Skills </h3>
                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                
                                                 <table class="table">
                                                      <tr>
                                                    <td style="font-weight:bold">Skill Name</td>
                                                         <td style="font-weight:bold">Percentage </td>
                                                         
                                                     </tr>
                                                      @foreach($skills as $skill)
                                                   <tr>
                                                      <td>{{$skill->name}}</td>
                                                       <td> {{$skill->percent}}% </td>
                         
                                                    </tr>
                                                 @endforeach   
                                                  </table>
                                                
                                                </div>
                                            </div>
                                        </div>
                           
                                    </div> 
                                    