{{Form::open(array('route'=>'deleteLocation'))}}

<select name="id">
    @foreach($locations as $location)

        <option  value="{{$location->id}}">{{$location->name}}</option>
    @endforeach
</select><br>

{{Form::submit()}}
{{Form::close()}}