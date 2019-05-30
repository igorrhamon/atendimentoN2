@extends('HD.layout.listarHDLayout')


@section('HDTable')
    <table class="table table-bordered ">
        <thead class="thead-light">
        <tr>
            <th style="width: 5%">#</th>
            <th>Endereço Lógico</th>
            <th>Responsável</th>
            <th>Receber</th>
        </tr>
        </thead>
        <tbody>
        @foreach($HDs as $HD)

            <tr>
                <th>{{$HD->id}}</th>
                <td>{{$HD->endLog}}</td>
                {{--                    @todo: Verificar o porquê route não está gerando a URL correta--}}
                <td>
                    @isset($HD->user->name) {{$HD->user->name}} @endisset
                </td>
                <td>
                    @if(!($HD->avaliable))
                        <a class="btn btn-secondary btn-sm" href="{{route('receberHD',$HD->id)}}" role="button">Receber</a>
                    @endif
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection