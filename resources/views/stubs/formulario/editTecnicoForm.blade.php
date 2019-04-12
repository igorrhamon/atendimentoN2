{{Form::open(array('route'=>'editTecnico'))}}
@csrf
Nome: {{Form::text('name',$tecnico->user->name)}} <br>
Email: {{Form::text('email')}}<br>
Password: {{Form::password('password',$tecnico->password)}}<br>
Horário de Almoço :{{Form::date('lunchTime',$tecnico->launchTime)}}<br>
Horário de Trabalho: {{Form::date('officeTime',$tecnico->officeTime)}}<br>
Localização: {{Form::hidden('location_id',$tecnico->location_id)}}<br>
Localização: {{Form::hidden('id',$tecnico->id)}}<br>
Localização: {{Form::hidden('remember_token',$tecnico->remember_token)}}<br>



User Id<br>
<select name="user_id">
    @foreach($users as $user)

        <option  @if($user->id == $tecnico->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select><br>
User: {{Form::hidden('status','1')}}
{{Form::submit()}}
{{Form::close()}}