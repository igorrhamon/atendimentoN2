@extends('news.layout.gerenciarNewsLayout')

@section('newsTable')

    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="thead-light">
            <tr>
                <th style="width: 5%">#</th>
                <th>Title</th>
                <th style="width: 10%">Editar</th>
                <th style="width: 10%">Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)

                <tr>
                    <th>{{$new->id}}</th>
                    <td><a href="{{route('openNewTecnico',$new->id)}}">{{$new->title}}</a></td>
{{--                    @todo: Verificar o porquê route não está gerando a URL correta--}}
                    <td><a class="btn btn-secondary btn-sm" href="{{url("editNew/{$new->id}")}}" role="button">Editar</a></td>
{{--                    <td><a class="btn btn-outline-danger btn-sm" href="{{route("deleteNew",$new->id)}}" role="button">Delete</a></td>--}}
                    <td>

                        <form method="POST" action="{{route('deleteNew',$new->id)}}">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{$new->id}}">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Apagar</button></td>
                    </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection