<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE settings -->
    <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
    <title></title>
    <meta name="description" content="Wireframe design of a landing page by Pingendo">
    <meta name="keywords" content="Pingendo bootstrap example template wireframe landing">
    <meta name="author" content="Pingendo">
    <!-- CSS dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js" type="text/javascript"></script>
</head>

<body class="" >
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
                <div class="row">
                    <div class="col-md-12">
                        @yield('newsTable')
                    </div>
                </div>
                <div class="row">
                    {{$news->render()}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-2">
                <div id="chart"></div>
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
</body>

</html>