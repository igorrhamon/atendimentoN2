{{Form::open(array('route'=>'createNew'))}}
Título: {{Form::text('title')}} <br>
Content: {{Form::text('content')}}<br>
Created_at: {{Form::text('created_at')}}<br>
Updated_at: {{Form::text('updated_at')}}<br>
{{Form::hidden('supervisor_id',2)}}
{{--<input value="1" type="hidden" id="supervisor_id">--}}

{{Form::submit()}}
{{Form::close()}}