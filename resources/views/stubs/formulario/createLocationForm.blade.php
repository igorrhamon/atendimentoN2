{{Form::open(array('route'=>'createLocation'))}}
Nome: {{Form::text('name')}}<Br>
Adress: {{Form::text('address')}}<br>
{{Form::hidden('supervisor_id',2)}}
{{Form::submit()}}
{{Form::close()}}
