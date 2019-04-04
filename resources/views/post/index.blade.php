@extends('layouts.app')

@section('title', 'Post Page')

@section('content')

<h1>Posts Listing</h1>

<div class="row">

    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->summary }}</td>
                    <td>
                        <a href="{{ route('post.view', ['post_id' => $post->id]) }}">View</a>
                        @if(auth()->user()->is_admin == 1)
                        <a href="{{ route('post.edit', ['post_id' => $post->id]) }}">Edit</a>
                        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @elseif(auth()->user()->is_admin != 1 && $post->user_id == auth()->user()->id)
                        <a href="{{ route('post.edit', ['post_id' => $post->id]) }}">Edit</a>
                        @endif                        
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection