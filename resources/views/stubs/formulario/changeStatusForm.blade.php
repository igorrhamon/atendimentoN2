{{Form::open(array('route'=>'changeStatus'))}}

<select name="id">
    @foreach($tecnicos as $tecnico)

        <option  value="{{$tecnico->id}}">{{$tecnico->user->name}} - @if($tecnico->status == 1) Ocupdado @else Disponível @endif</option>
    @endforeach
</select><br>
Novo Status:<br>
<select name="status">
    <option value="1">Ocupado</option>
    <option value="0">Disponível</option>
</select>
{{Form::submit()}}
{{Form::close()}}