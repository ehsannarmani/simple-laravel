@extends('layouts.master')

@section('title',"Create Article")

@section("content")
    <h1 class="mx-auto">New Article</h1>
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
        <div class="alert alert-success">Article created successful</div>
    @endif
    <form action="/admin/article/create" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input name="title" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" type="text" class="form-control"></textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-success w-100" value="Create">
    </form>
@endsection
