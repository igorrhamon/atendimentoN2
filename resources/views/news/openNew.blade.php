@extends('news.layout.articleLayout')

@section('article')
    <div class="row">
        <div class="col-md-12">
            <h1 class="">{{$new->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 border-bottom border-primary">
            <ul class="list-inline">
                <li class="list-inline-item">{{$new->supervisor->user->name}}<br></li>
                <li class="list-inline-item">Tags</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="">{{$new->content}}</p>
        </div>
    </div>
@endsection