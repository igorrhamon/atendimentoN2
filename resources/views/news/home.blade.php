@extends('news.layout.homeNewsLayout')

@section('news')
    @foreach($news as $new)
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 py-1">{{$new->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    <li class="list-inline-item">{{$new->supervisor->user->name}}<br></li>
{{--                    <li class="list-inline-item">{{date('d-m-y',$new->updated_at)}}</li>--}}
                    <li class="list-inline-item">Tags</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="">{{$new->content}}</p>
            </div>
        </div>
        <hr class="w-75" >
    @endforeach
{{$news->render()}}
@endsection
