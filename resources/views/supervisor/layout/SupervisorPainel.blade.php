<!DOCTYPE html>
<html>

@include('layouts.head')

<body class="">
@include('layouts.navLaytout')
<div class="d-flex align-items-center bg-info h-25">
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center col-md-6">
                <h1 class="display-1 text-white">Supervisor</h1>
            </div>
        </div>
    </div>
</div>
<div class="py-5" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-12" style="">
                            <div class="row py-2">
                                <div class="col-md-12">
                                    <h2 class="">Técnicos Em Atendimento</h2>
                                </div>
                            </div>
                            <div class="row">
                                @if($locations->count() ==0 )
                                    <div class="col-12">
                                        <span >Não há técnicos em atendimento no momento</span>
                                    </div>
                                @else
                                <div class="col-3 py-2">
                                    @yield('navPainel')
                                </div>
                                <div class="col-9 py-2">
                                    <!-- Tab panes -->
                                    @yield('tabContent')
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 py-2">
                                    <h2 class="" >Gráficos de Atendimento</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 py-2">
                                    <div id="chart"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12" style="">
                            <div class="col-md-12">
                                @include('layouts.menuLateralArtigo')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-dark py-3">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">Desenvolvido por @<a href="mailto:igorrc@senado.gov.br">igorrhamon</a></p>
            </div>
            <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">2018 - Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" style=""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"> </script>
</body>

</html>