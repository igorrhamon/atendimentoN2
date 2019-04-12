{{Form::open(array('route'=>'editNew'))}}
Título: {{Form::text('title',$new->title)}} <br>
Content: {{Form::text('content',$new->content)}}<br>
Created_at: {{Form::text('created_at',$new->created_at)}}<br>
Updated_at: {{Form::text('updated_at',$new->updated_at)}}<br>
{{Form::hidden('supervisor_id',$new->supervisor_id)}}
{{Form::hidden('id',$new->id)}}
{{Form::submit()}}
{{Form::close()}}