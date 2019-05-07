@extends('tecnicos.layout.layoutIniciarAtendimento')


@section('formIniciarAtendimento')
    <form class="text-left" method="POST" action="{{route('changeLocation')}}">
        @csrf
        <div class="form-group"> <label for="form16">Número do Chamado</label> <input type="text" class="form-control" id="numeroChamado" placeholder="20190327100000000"> </div>
        {{Form::hidden('id',$tecnico->id)}}
        <div class="form-group">
            <label for="form17">Localização</label>
            <select name="location_id" class="form-control">
                @foreach($locations as $location)
                    <option  @if($tecnico->location_id == $location->id) selected @endif value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
        </div>




        <button type="submit" class="btn btn-primary">Iniciar</button>
    </form>
@endsection
