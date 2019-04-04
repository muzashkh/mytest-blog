@extends('layouts.app')

@section('title', 'Post Details Page')

@section('content')

    <h1>Post View</h1>

        <div class="row">
            <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class='form-control' name="title" id="title" value="{{ $post[0]->title }}" required>
            </div>
            <div class="form-group col-md-12">
                    <label>Summary</label>
                    <textarea class='form-control' name="summary" id="summary" required>{{ $post[0]->summary }}</textarea>
            </div>
            <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea class='form-control' name="description" id="description" required>{{ $post[0]->description }}</textarea>
            </div>
        </div>

    <div class="form-group col-md-12 text-center">
            <a class="btn btn-danger form-control" href="{{ route('admin.posts') }}" style="color: #fff;">BACK</a>
    </div>

@endsection