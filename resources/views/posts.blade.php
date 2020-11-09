@extends('layouts.app')

@section('title', 'Posts')

@section('body')
<div class="container">
    <section>
        <h1 class="my-4">All posts</h1>
        <h2>Hello, {{session('name')}}! What's on your mind?</h2>
        @foreach($posts as $post)
            <div class="row justify-content-center">
                <div class="col-8 card my-2">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post['author'] }}</h3>
                        <p class="card-text">{{ $post['content'] }}</p>
                        <h4>Comments</h4>
                        @isset($post['comments'])
                            <section class="ml-3">
                                @foreach($post['comments'] as $comment)
                                    <h5 class="d-inline">
                                        {{ $comment['author'] }}</h5>
                                    <p>{{ $comment['content'] }}</p>
                                @endforeach
                            </section>
                        @endisset
                        @empty($post['comments'])
                            <p>No comment yet!</p>
                        @endempty
                        <form class="form-inline" method="POST" action="/comment">
                            @csrf
                            <label class="sr-only" for="comment">Write a comment</label>
                            <div class="form-group flex-grow-1">
                                <input class="form-control w-100" id="comment" name="comment" placeholder="comment..." />
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section>
        <form method="POST" action="/post">
            @csrf
            <label for="content">
                <h1 class="m-0">Write a new post</h1>
            </label>
            <div class="form-group">
                <textarea class="form-control" id="content" name="content" rows="5"
                    placeholder="Post content..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </section>
</div>

@endsection
