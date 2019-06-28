@extends('tecnicos.layout.openTecnicoLayout')


@section('userProfile')
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Horário de Almoço</th>
            <th scope="col">Tempo sem atender</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnicos as $tecnico)
            <tr>
                <th scope="row"><a href="{{route('abrirTecnicoProfile',$tecnico->id)}}">{{$tecnico->user->name}}</a></th>
                <td scope="row">{{$tecnico->user->lunchTime}}</td>
                <td scope="row">@if(isset($tecnico->tempoSemAtender)){{$tecnico->tempoSemAtender}} @else Não atendeu hoje @endisset</td>
                @if($tecnico->almoçoProximo)
                    <td><span class="badge badge-warning">Horário de Almoço</span></td>
                @else
                    <td></td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection