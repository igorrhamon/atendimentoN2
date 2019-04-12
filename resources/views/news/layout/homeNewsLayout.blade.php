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
<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-bullseye"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-between" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="#">Home</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link mx-2" href="#">Técnicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{route('voyager.logout')}}">Sair</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control" type="text">
                <button class="btn btn-link my-2 my-sm-0" type="submit"><i class="fa d-inline fa-lg fa-search text-primary"></i></button>
            </form>
        </div>
    </div>
</nav>
<div class="d-flex align-items-center bg-info h-25">
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
                <div class="row my-2 p-1">
                    <div class="col-md-12">
                        <h2 class="py-1 text-center">Atendimento<br></h2>
                        <hr class="w-25">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
                            <a href="#" class="list-group-item list-group-item-action">Tempo de Atendimento hoje:</a>
                            @auth()<a href="#" class="list-group-item list-group-item-action">Iniciar Atendimento</a>@endauth
                        </div>
                    </div>
                </div>
                <div class="row my-2 p-1">
                    <div class="col-md-12">
                        <h2 class="text-center">Artigos</h2>
                        <hr class="w-25">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active py-1">Suas Informações</a>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> Não Lido <span class="badge badge-primary badge-pill">14</span> </li>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Links Importantes</h2>
                        <hr class="w-25">
                        <div class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Base&nbsp;</li>
                            <li class="list-group-item d-flex justify-content-between align-items-start"><br></li>
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