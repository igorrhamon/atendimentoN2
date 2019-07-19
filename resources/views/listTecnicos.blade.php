@extends('layouts.layoutListTecnicos')
{{$x = 1}}
@section('tecnicoInformations')

    @foreach($tecnicos as $tecnico)
        {{$tecnicos->count()%$x}}
        {{++$x}}
    @endforeach

@endsection