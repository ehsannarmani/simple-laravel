@extends('layouts.master')

@section('title',"Create Article")

@section("content")
    <h1 class="mx-auto">Edit Article</h1>
    <br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->get('status') == "success")
        <div class="alert alert-success">Article edited successful</div>
    @endif
    <form action="/admin/article/edit/{{$article->id}}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="title">Title:</label>
            <input name="title" type="text" class="form-control" value="{{$article->title}}"/>
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" rows="10" type="text" class="form-control">{{$article->body}}</textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-success w-100" value="Edit">
    </form>
@endsection
