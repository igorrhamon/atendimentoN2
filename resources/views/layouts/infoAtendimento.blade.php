<h2 class="py-1 text-center">Atendimento<br></h2>
<hr class="w-25">
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
    <a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje: {{$tempoAtendimentoHoje}}</a>
    @if(Auth()->user()->tecnico->status == 0)<a href="{{route('iniciarAtendimento',Auth()->id())}}" class="list-group-item list-group-item-action">Iniciar Atendimento</a>@endif
    @if(Auth()->user()->tecnico->status == 1)
        @if($atendimento->hardDriveRecebido == FALSE)
            <a class="list-group-item list-group-item-action list-group-item-info active py-1">Devolva o HD {{$atendimento->hardDrive->endLog}} para encerrar o chamado</a>
        @else
            <a href="{{route('encerraAtendimento',$atendimento->id)}}" class="list-group-item list-group-item-action active py-1">Encerrar Atendimento</a>@endif
    @endif

    <a href="#" class="list-group-item list-group-item-action">Localização Atual: {{$location->name}}</a>

</div>