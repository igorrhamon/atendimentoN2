<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE settings -->
    <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
    <title>Album</title>
    <meta name="description" content="Wireframe design of an album page by Pingendo">
    <meta name="keywords" content="Pingendo bootstrap example template wireframe album ">
    <meta name="author" content="Pingendo">
    <!-- CSS dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">
            <div class="col-md-7 py-4">
                <h4>About</h4>
                <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col-md-3 offset-md-1 py-4">
                <h4>Contact</h4>
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="text-secondary">Follow on Twitter</a>
                    </li>
                    <li>
                        <a href="#" class="text-secondary">Like on Facebook</a>
                    </li>
                    <li>
                        <a href="#" class="text-secondary">Email me</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center"><i class="fa d-inline fa-camera mr-2"></i><strong>Album</strong> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"> <span class="navbar-toggler-icon"></span> </button>
    </div>
</div>
<div class="py-5 text-center" >
    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-6 col-10">
                <h1>O my friend</h1>
                <p class="mb-3">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees.</p>
                    {{Form::open(array('route'=>'newTecnico','class'=>'text-left'))}}

                    <div class="form-group"> <label for="form16">Nome: </label>{{Form::text('name',null,array('class'=>'form-control'))}} </div>
                    <div class="form-group"> <label for="form16">Email: </label>{{Form::email('email',null,array('class'=>'form-control'))}} </div>

                    <div class="form-group"> <label for="form17">Password:</label> {{Form::password('password',null,array('class'=>'form-control'))}}  </div>
                    <div class="form-group"> <label for="form17">Horário de Almoço: </label> {{Form::time('lunchTime',null,array('class'=>'form-control'))}} </div>
                    <div class="form-group"> <label for="form17">Horário de Entrada: </label> {{Form::time('officeTime',null,array('class'=>'form-control'))}} </div>

                    <div class="form-group">
                    </div> <button type="submit" class="btn btn-primary">Criar</button>
                {{Form::hidden('user_id',null)}}
                {{Form::hidden('location_id','1',null,array('class'=>'form-control'))}}
                {{Form::hidden('status','0')}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album template is based on Bootstrap © examples.&nbsp; <br>New to Bootstrap? <a href="#">Visit the homepage</a> or read our <a href="#">getting started guide</a>.</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
</body>

</html>