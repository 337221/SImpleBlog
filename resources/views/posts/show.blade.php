@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">{{ $post->title }}</h1>
    <p class="body-text">{{ $post->body }}</p>
    <div class="comments-section">
        <h2 class="title">Comments</h2>
        @foreach ($post->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->body }}</p>
                <p class="body-textt">{{ $comment->created_at->format('F j, Y') }}</p>
            </div>
        @endforeach
    </div>
    @auth
    <form method="POST" action="{{ route('comments.store', $post->id) }}">
        @csrf
        <textarea name="body" class="body-text" required placeholder="Leave a comment..."></textarea>
        <button type="submit" class="button">Add Comment</button>
    </form>
    @endauth
    @guest
    <p><a href="{{ route('login') }}">Log in</a> to leave a comment.</p>
    @endguest
</div>
@endsection
