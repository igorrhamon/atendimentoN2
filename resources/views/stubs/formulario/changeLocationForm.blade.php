{{Form::open(array('route'=>'changeLocation'))}}

{{Form::hidden('id',$tecnico->id)}}
<select name="location_id">
    @foreach($locations as $location)

        <option  @if($tecnico->location_id == $location->id) selected @endif value="{{$location->id}}">{{$location->name}}</option>
    @endforeach
</select><br>
{{Form::submit()}}
{{Form::close()}}