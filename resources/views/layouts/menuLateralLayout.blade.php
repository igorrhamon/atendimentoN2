<div class="row my-2 p-1">
    <div class="col-md-12">
        <h2 class="py-1 text-center">Atendimento<br></h2>
        <hr class="w-25">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
            <a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje:</a>
            <a href="#" class="list-group-item list-group-item-action">Iniciar Atendimento</a> </div>
    </div>
</div>
<div class="row my-2 p-1">
    <div class="col-md-12">
        <h2 class="text-center">Artigos</h2>
        <hr class="w-25">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Não Lido <span class="badge badge-primary badge-pill">{{$naoLidas->count()}}</span> </li>
        </div>
    </div>
</div>
@isset($AnyChartJson)
    <div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Links Importantes</h2>
        <hr class="w-25">
        <div class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Atendimentos Hoje</li>
            <li class="list-group-item d-flex justify-content-between align-items-start"><br></li>
        </div>
    </div>
</div>
@endisset
