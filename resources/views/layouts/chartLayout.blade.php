@if(($AnyChartJson->isNotEmpty()))
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