<html>



@include('layouts.head')

<body>
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
@yield('mapa')

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
<script src="{{asset('js/app.js')}}"></script>
</body>

</html>

