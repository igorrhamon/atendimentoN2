@extends('location.layout.locationTecnicoLayout')


@section('location')


    <div class="col-md-8 ml-md-auto">
{{--        <ul class="list-group">--}}
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Chamado</th>
                        <th>HD</th>
                        <th>Inicio Atendimento</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($atendimentos as $atendimento)
                    <tr>
                        <td>{{$atendimento->tecnico->user->name}}</td>
                        <td><a href="{{url('http://capri.senado.gov.br/otrs/index.pl?Action=AgentTicketZoom;TicketNumber='.$atendimento->numeroChamado)}}" target="_blank">{{$atendimento->numeroChamado}}</a></td>
                        <td>
                            @if(!empty($atendimento->hardDrive))
                                {{$atendimento->hardDrive->endLog}}
                            @endif
                        </td>
{{--                        <td>HE{{$atendimento->hardDrive->endLog ? "HE".$atendimento->hardDrive->endLog : "Sem HD" }}</td>--}}
                        <td>{{$atendimento->inicioAtendimento}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
{{--        <li class="list-group-item active">{{$tecnico->user->name}}</li>--}}
{{--        <li class="list-group-item">{{$tecnico->location->name}}</li>--}}
{{--        <li class="list-group-item">HD: HE{{$tecnico->atendimentos->last()->hardDrive->endLog}}</li>--}}
{{--        <li class="list-group-item"><a href="{{url('http://capri.senado.gov.br/otrs/index.pl?Action=AgentTicketZoom;TicketNumber='.$tecnico->ultimoAtendimentoAberto->first()->numeroChamado)}}">{{$tecnico->ultimoAtendimentoAberto->first()->numeroChamado}}</a></li>--}}
{{--        <li class="list-group-item">Vestibulum at eros</li>--}}
{{--        </ul>--}}
    </div>

    {{--            <div class="col-md-8 ml-md-auto">--}}
    {{--                <div class="card" style="width: 18rem;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h5 class="card-title">{{$tecnico->user->name}}</h5>--}}
    {{--                        <p class="card-text"><a href="{{$tecnico}}"></a></p>--}}
    {{--                    </div>--}}
    {{--                    <ul class="list-group list-group-flush">--}}
    {{--                        <li class="list-group-item">{{$tecnico->location->name}}</li>--}}
    {{--                        <li class="list-group-item">{{$tecnico->atendimentos->last()->hardDrive->endLog}}</li>--}}
    {{--                        <li class="list-group-item">Vestibulum at eros</li>--}}
    {{--                    </ul>--}}
    {{--                    <div class="card-body">--}}
    {{--                        <a href="#" class="card-link">Card link</a>--}}
    {{--                        <a href="#" class="card-link">Another link</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}


@endsection