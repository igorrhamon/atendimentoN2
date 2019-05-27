
<div class="row my-2 p-1">
    <div class="col-md-12">
        {{--                        @if(!Auth::user()->isAdmin())--}}
        <h2 class="py-1 text-center">Atendimento<br></h2>
        <hr class="w-25">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
            <a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje: {{$tempoAtendimentoHoje}}</a>
            @if(Auth()->user()->tecnico->status == 0)<a href="{{route('iniciarAtendimento',Auth()->id())}}" class="list-group-item list-group-item-action">Iniciar Atendimento</a>@endif
            @if(Auth()->user()->tecnico->status == 1)<a href="{{route('encerraAtendimento',$atendimento->id)}}" class="list-group-item list-group-item-action active py-1">Encerrar Atendimento</a>@endif
            <a href="#" class="list-group-item list-group-item-action">Localização Atual: {{$location->name}}</a>

        </div>
    </div>
</div>
<div class="row my-2 p-1">
    <div class="col-md-12">
        <h2 class="text-center">Artigos</h2>
        <hr class="w-25">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
            <li class="list-group-item d-flex justify-content-between align-items-center"> <a href="{{route('indexNaoLido')}}">Não Lido </a> <span class="badge badge-primary badge-pill">{{$naoLidas->count()}}</span> </li>
        </div>
    </div>
</div>
<div class="row my-2 p-1">
    <div class="col-md-12">
        @includeWhen(Auth::user()->isAdmin(),'layouts.menuLateralArtigo')
    </div>
</div>
<div class="row my-2 p-1">
    <div class="col-md-12" >
    @if(($AnyChartJson->first()->tempoDeAtendimento ==  0))
            <h2 class="text-center">Gráfico</h2>
            <hr class="w-25">
            <div class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center active py-1"></li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div id="chart"></div>
            </li>
        </div>
        @else
            <h3 class="text-center">Nenhum atendimento hoje</h3>
            <hr class="w-25">
            <p class="text-center text-info">O gráfico será gerado após o primeiro atendimento</p>
        @endif
    </div>
</div>
