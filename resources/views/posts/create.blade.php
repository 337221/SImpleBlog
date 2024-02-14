@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Create a New Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="body-text" required>
        </div>
        <div>
            <label for="body">Body:</label>
            <textarea name="body" id="body" rows="10" class="body-text" required></textarea>
        </div>
        <button type="submit" class="button">Create</button>
    </form>
</div>
@endsection
