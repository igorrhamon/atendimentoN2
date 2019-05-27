@extends('news.layout.criarNewLayout')




@section('formCriarArtigo')
    <form class="" action="{{route('createNew')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" placeholder="" name="title" autocomplete="OFF">
        </div>
        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="content"  class="form-control"></textarea>
        </div>
        <input type="hidden" value="{{Auth::id()}}" name="supervisor_id">
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
@endsection