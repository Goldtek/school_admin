<div class="row" id="row{{$i}}" style="margin-top:2%">
    <div class="col-sm-10"> 
        <select class="form-control" name="course{{$i}}">
            <option value="">Select</option>
            @foreach($classes as $c)
          <option value="{{$c->id}}">{{$c->name}} </option>  
            @endforeach
        </select>
    </div>
    
    <div class="col-sm-1"> 
        <button type="button" class="btn  btn-circle btn_remove btn-md fa fa-trash" id="{{$i}}" style="margin-right:0.7%; padding:0.6%; margin-top:8px; text-align:center"></button>
    </div> 
</div>