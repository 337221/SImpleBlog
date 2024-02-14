@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title">Blog Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>
    <br>
    @foreach ($posts as $post)
        <div class="post-preview">
            <h1 class="title">{{ $post->title }}</h1>
            <p class="body-textt">Created on {{ $post->created_at->format('F j, Y') }} by {{ $post->user->name }}</p>
            <p class="body-text">{{ $post->preview }}</p><a href="{{ route('posts.show', $post->id) }}" class="read-more">Read more</a>
        </div>
        <br>
    @endforeach
</div>
@endsection
