
                            @foreach($class_courses as $c) 
                                <div class="row" style="margin-top:2%">
                                    <div class="col-sm-10">
                                        <select class="form-control  service" > <!-- normally an array sarts at 0 to equate it with count add 1 to each 0+1=1 -->
                                            
                                          <option value="{{$c->id}}" >{{$c->name}} </option>  
                                          
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                     