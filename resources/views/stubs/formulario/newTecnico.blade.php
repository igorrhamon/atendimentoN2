{{Form::open(array('route'=>'newTecnico'))}}
@csrf
Nome: {{Form::text('name')}} <br>
Email: {{Form::text('email')}}<br>
Password: {{Form::password('password')}}<br>
Horário de Almoço :{{Form::date('launchtime')}}<br>
Horário de Trabalho: {{Form::date('officeTime')}}<br>
Localização: {{Form::hidden('location_id','1')}}<br>

User Id<br>
<select name="user_id">
    @foreach($users as $user)
        <option  value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select><br>
User: {{Form::hidden('status','1')}}
{{Form::submit()}}
{{Form::close()}}