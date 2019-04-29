<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-bullseye"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-between" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{route('showAllNews')}}">Home</a>
                </li>
                @if(Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{route('supervisorAdmin')}}">Técnicos</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{route('logout')}}">Sair</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control" type="text">
                <button class="btn btn-link my-2 my-sm-0" type="submit"><i class="fa d-inline fa-lg fa-search text-primary"></i></button>
            </form>
        </div>
    </div>
</nav>