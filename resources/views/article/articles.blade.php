@extends('layouts.master')
@section('title',"Articles")

@section("content")

    @if(session()->get('message'))
        <div class="alert alert-primary">{{ session()->get('message') }}</div>
    @endif
    <div class="row">
        @if(is_null($articles) || count($articles) == 0)
            <h2>No Article Found</h2>
        @else
            @foreach($articles as $article)
                <div class="card col-5 my-1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                        <form action="/admin/articles/delete/{{$article->id}}" class="d-inline" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="/admin/article/edit/{{$article->id}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                @if(!$loop->even)
                    <div class="col-2"></div>
                @endif
            @endforeach
        @endif
    </div>
    <br>
    <a class="btn btn-success w-100" href="/admin/article/create">Create Article</a>

@endsection
