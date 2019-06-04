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
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="py-5">
                    <div class="row">
                        <div class="col-md-8">@yield('location')</div>
                        <div class="col-md-4">@include('layouts.sideBar')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="container">--}}
{{--    <div class="row">--}}

{{--        @yield('location')--}}
{{--        <div class="col-4">--}}
{{--            SIDEBAR--}}
{{--            @include('layouts.sideBar')--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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

</body>

</html>