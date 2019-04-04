@extends('layouts.app')

@section('title', 'Post Details Page')

@section('content')

    <h1>Post Details</h1>

    <form action="{{ route('post.editpost', ['post_id' => $post->id]) }}" method="POST">

        @csrf

        <div class="row">
            <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class='form-control' name="title" id="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group col-md-12">
                    <label>Summary</label>
                    <textarea class='form-control' name="summary" id="summary" required>{{ $post->summary }}</textarea>
            </div>
            <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea class='form-control' name="description" id="description" required>{{ $post->description }}</textarea>
            </div>
            <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-info form-control">SAVE</button>                    
            </div>
        </div>

    </form>
    <div class="form-group col-md-12 text-center">
            <a class="btn btn-danger form-control" href="{{ route('admin.posts') }}" style="color: #fff;">CANCEL</a>
    </div>

@endsection