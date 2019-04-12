{{Form::open(array('route'=>'editLocation'))}}
Nome: {{Form::text('name',$location->name)}}<Br>
Adress: {{Form::text('address',$location->address)}}<br>
{{Form::hidden('supervisor_id',$location->supervisor_id)}}
{{Form::hidden('id',$location->id)}}
{{Form::submit()}}
{{Form::close()}}