@extends('tecnicos.layout.openTecnicoLayout')


@section('userProfile')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <figure class="figure">
                            <img src="{{asset($tecnico->user->avatar)}}" class="figure-img img-fluid rounded" alt="...">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-8 pl-5">
                <div class="row">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">
                            {{$tecnico->user->name}}
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">
                            Status: {!! $tecnico->status ?   "Indisponível": "<span class='badge badge-success'>Disponível</span>" !!}
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">
                            Horário de Almoço: {{$tecnico->user->lunchTime}}
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">
                            Tempo de Atendimento: {{$tecnico->tempoDeAtendimento}}
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">
                            Email: {{$tecnico->user->email}}
                        </button>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">

        </div>
    </div>
@endsection