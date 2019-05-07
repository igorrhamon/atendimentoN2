@extends('supervisor.layout.SupervisorPainel')


@section('navPainel')
    <div class="list-group" id="myList" role="tablist">
        @foreach($locations as $location)
            <a class="list-group-item list-group-item-action  " data-toggle="list" href="#location{{$location->id}}" role="tab">{{$location->name}}</a>
        @endforeach
    </div>
@endsection
@section('tabContent')
    <div class="tab-content">
        @foreach($locations as $location)
            <div class="tab-pane" id="location{{$location->id}}" role="tabpanel">
                @foreach($location->tecnicos as $tecnico)
                    {{$tecnico->user->name}}<BR>
                    {{$tecnico->atendimentos->last()}}<BR>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection