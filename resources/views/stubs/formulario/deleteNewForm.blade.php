{{Form::open(array('route'=>'deleteNew'))}}

<select name="id">
    @foreach($news as $new)

        <option  value="{{$new->id}}">{{$new->title}}</option>
    @endforeach
</select><br>
{{Form::submit()}}
{{Form::close()}}