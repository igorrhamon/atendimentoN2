@extends('tecnicos.layout.layoutIniciarAtendimento')


@section('formIniciarAtendimento')
    <form class="text-left" method="POST" action="{{route('changeLocation')}}">
        @csrf
        <div class="form-group"> <label for="form16">Número do Chamado</label>{{Form::text('numeroChamado',NULL,array('class'=>'form-control','placeholder'=>'20190327100000000'))}}  </div>
        {{Form::hidden('id',$tecnico->id)}}
        <div class="form-group">
            <label for="form17">Localização</label>
            <select name="location_id" class="form-control">
                @foreach($locations as $location)
                    <option  @if($tecnico->location_id == $location->id) selected @endif value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" id="hardDriveChoose" onchange="showDiv('hardDrive')">
                <label class="form-check-label" for="hardDrive">
                    Com HD
                </label>
            </div>
        </div>
        <div class="form-group" id="hardDrive" >
            <div>
{{--                @todo: Resolver o problema de iniciar o atendimento sem HD--}}
                <select name="hardDrive_id" class="form-control">
                        <option value="1" selected></option>
                    @foreach($hardDrives as $hardDrive)
                        <option value="{{$hardDrive->endLog}}">HE{{$hardDrive->endLog}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Iniciar</button>
        </div>

    </form>
@endsection
