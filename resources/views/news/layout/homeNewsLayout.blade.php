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
</head>

<body class="">
@include('layouts.navLaytout')
<div class="d-flex align-items-center bg-info  h-25" style="	background-image: url(http://www.senado.leg.br/noticias/TV/scripts/GetImagemMidia.asp?COD_MIDIA=444267);	background-position: center;	background-size: 70%;	background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center col-md-6">
                <h1 class="display-1 text-white">Nível 2</h1>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 px-3" >
                @yield('news')
            </div>
            <div class="col-md-4 px-2">
                @include('layouts.sideBar')
            </div>
        </div>
    </div>
</div>
<div class="bg-dark py-3">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">Copyright - Lorem ipsum dolor sit amet</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">2018 - Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>