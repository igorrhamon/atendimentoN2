<h2 class="py-1 text-center">Atendimento<br></h2>
<hr class="w-25">
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
    <a href="#" class="list-group-item list-group-item-action">Localização Atual: {{$location->name}}</a>
{{--    Se for falso, o técnico não está atendendo--}}
    @if(Auth()->user()->tecnico->status == 0)
        <a href="{{route('iniciarAtendimento',Auth()->id())}}" class="list-group-item list-group-item-action">Iniciar Atendimento</a>
{{--   Se  for verdadeiro o técnico está atendendo   --}}
    @else
        <a href="{{url('http://capri.senado.gov.br/otrs/index.pl?Action=AgentTicketZoom;TicketNumber='.$atendimento->numeroChamado)}}" target="_blank" class="list-group-item list-group-item-action">
            <div class=' text-info' role='alert'>   Chamado: {!! $atendimento->numeroChamado ? $atendimento->numeroChamado : "Sem Número do Chamado" !!}</div>
        </a>
        {{--    Se hardDrive_id tiver algum ID, então foi necessário um HD.    --}}
        @if($atendimento->hardDrive_id != NULL)
{{--            Se o hardDriveRecebido for falso, é necessário a devolução do HD--}}
            @if($atendimento->hardDriveRecebido == FALSE ) <a class="list-group-item list-group-item-action list-group-item-info active py-1">Devolva o HD {{$atendimento->hardDrive->endLog}} para encerrar o chamado</a>
            @else <a href="{{route('encerraAtendimento',$atendimento->id)}}" class="list-group-item list-group-item-action active py-1">Encerrar Atendimento</a>
            @endif
        @else
            <a href="{{route('encerraAtendimento',$atendimento->id)}}" class="list-group-item list-group-item-action active py-1">Encerrar Atendimento</a>
        @endif
    @endif
            @if(isset($tempoAtendimentoHoje))
                <a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje: {{$tempoAtendimentoHoje}}</a>
            @endif
</div>



{{--<a href="{{route('iniciarAtendimento',Auth()->id())}}" class="list-group-item list-group-item-action">Iniciar Atendimento</a>--}}
{{--<a class="list-group-item list-group-item-action list-group-item-info active py-1">Devolva o HD {{$atendimento->hardDrive->endLog}} para encerrar o chamado</a>--}}
{{--<a href="{{route('encerraAtendimento',$atendimento->id)}}" class="list-group-item list-group-item-action active py-1">Encerrar Atendimento</a>--}}
{{--<a href="#" class="list-group-item list-group-item-action">Localização Atual: {{$location->name}}</a>--}}
{{--<a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje: {{$tempoAtendimentoHoje}}</a>--}}

{{--@if(Auth()->user()->tecnico->status == 0)--}}
{{--    @if(Auth()->user()->tecnico->status == 1)--}}
{{--        @if($atendimento->hardDrive_id != NULL)--}}
{{--            @if($atendimento->hardDriveRecebido == FALSE )--}}