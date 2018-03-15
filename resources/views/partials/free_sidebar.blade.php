  <aside>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Freelance Categories</span></div>
                                    <ul class="categories-module">
                                        @if($agric>0) <li> <a href="{{route('freeCatSearch',['category'=>'Agriculture'])}}"> Agriculture <span>({{$agric}})</span> </a> </li> @endif
                                       @if($ad>0)   <li> <a href="{{route('freeCatSearch',['category'=>'Advertising'])}}"> Advertising / Media<span>({{$ad}})</span> </a> </li>@endif
                                       @if($bank>0)  <li> <a href="{{route('freeCatSearch',['category'=>'Banking'])}}"> Banking / Financial Services <span>({{$bank}})</span> </a> </li>@endif
                                         @if($drink>0) <li> <a href="{{route('freeCatSearch',['category'=>'Beverages'])}}"> Beverages / Drinks <span>({{$drink}})</span> </a> </li>@endif 
                                        @if($energy>0) <li> <a href="{{route('freeCatSearch',['category'=>'Energy'])}}"> Energy / Power <span>({{$energy}})</span> </a> </li>@endif
                                       
                                        @if($ict>0) <li> <a href="{{route('freeCatSearch',['category'=>'ICT'])}}"> ICT / Telecommunications <span>({{$ict}})</span> </a> </li>@endif
                                        @if($oil>0) <li> <a href="{{route('freeCatSearch',['category'=>'Oil & Gas'])}}"> Oil & Gas / Mining <span>({{$oil}})</span> </a> </li>@endif
                                        @if($gov>0) <li> <a href="{{route('freeCatSearch',['category'=>'Government Agencies'])}}"> Government Agencies <span>({{$gov}})</span> </a> </li>@endif
                                       @if($consult>0)  <li> <a href="{{route('freeCatSearch',['category'=>'Agriculture'])}}">Consulting <span>({{$consult}})</span> </a> </li>@endif
                                       @if($maritime>0)  <li> <a href="{{route('freeCatSearch',['category'=>'Engineering'])}}"> Engineering / Maritime <span>({{$maritime}})</span> </a> </li>@endif
                                      @if($trade>0)   <li> <a href="{{route('freeCatSearch',['category'=>'Trade'])}}"> Trade / Services <span>({{$trade}})</span> </a> </li>@endif
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Freelance Jobs</span></div>
                                    <ul class="related-post">
                                        @foreach($hotjob as $ht)
                                        <li>
                                            <a href="{{route('view_freelance',['id'=>$ht->id])}}"> {{$ht->title}} </a>
                                            <span><i class="fa fa-map-marker"></i> {{$ht->location}} </span>
                                            <span><i class="fa fa-calendar"></i>{{date("d-M-Y",strtotime($ht->created_at))}} - {{date("d-M-Y",strtotime($ht->enddate))}} </span>
                                        </li>
                                     
                                      @endforeach
                                        
                                    </ul>
                                </div>

                            </aside>