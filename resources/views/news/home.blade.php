@extends('news.layout.homeNewsLayout')

@section('news')

    @foreach($news as $new)
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 py-1"><a href="{{route('openNewTecnico',$new->id)}}" >{{$new->title}}</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    <li class="list-inline-item">{{$new->supervisor->user->name}}<br></li>
                    <li class="list-inline-item ">{{$new->criadoEm}}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="">{{substr($new->content,0,-21)}}&nbsp;<a href="{{route('openNewTecnico',$new->id)}}" class="stretched-link text-dark">...</a></p>
            </div>
        </div>
        <hr class="w-75" >
    @endforeach
{{$news->render()}}
@endsection
@section('anyChart')

@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>

    @if(Auth::user()->isAdmin()))
{{--        <script>--}}

{{--            // Enable pusher logging - don't include this in production--}}
{{--            Pusher.logToConsole = true;--}}

{{--                var pusher = new Pusher('b482df66d9836d1f97b5', {--}}
{{--                    cluster: 'mt1',--}}
{{--                    forceTLS: true--}}
{{--                });--}}

{{--                var channel = pusher.subscribe('my-channel');--}}
{{--                channel.bind('formSender', function(data) {--}}
{{--                    if (!Notification) {--}}
{{--                        alert('Desktop notifications not available in your browser. Try Chrome.');--}}
{{--                        return;--}}
{{--                    }--}}

{{--                    if (Notification.permission !== "granted")Notification.requestPermission();--}}


{{--                    else {--}}
{{--                        var notification = new Notification(data.title, {--}}
{{--                            icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',--}}
{{--                            body: data.body--}}
{{--                        });--}}
{{--                        //@todo: Ativiar o onClick. Ele não lê o númro do chamado--}}

{{--                    notification.onclick = function () {--}}
{{--                        window.open('/adminPainel');--}}
{{--                    };--}}

{{--                    }--}}
{{--                });--}}
{{--        </script>--}}
    @endif

    <script>
        window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
    </script>
@endsection