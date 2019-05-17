@extends('supervisor.layout.SupervisorPainel')

@section('navPainel')
    <div class="list-group" id="myList" role="tablist">
        @foreach($locations as $location)
            <a class="list-group-item list-group-item-action @if($loop->first) active @endif " data-toggle="list" href="#location{{$location->id}}" role="tab">{{$location->name}}</a>
        @endforeach
    </div>
@endsection
@section('tabContent')
    <div class="tab-content">
        @foreach($locations as $location)
            <div class="tab-pane" id="location{{$location->id}}" role="tabpanel">
                @foreach($location->tecnicos as $tecnico)
                    {{$tecnico->user->name}}<BR>
                    @foreach($tecnico->atendimentos as $atendimentoTecnico)
                        @if($loop->last) {{$atendimentoTecnico->numeroChamado}} @endif
                    @endforeach<BR>
{{--                    {{$tecnico->atendimentosLast}}<BR>--}}
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

@section('chartData')
    @foreach($AnyChartJson as $tecnico)
        ['{{$tecnico->user->name}}',{{$tecnico->tempoDeAtendimento}}],
    @endforeach
@endsection