@extends('layouts.app')

@section('title', 'Posts')

@section('body')
<div class="container">
    <section>
        <a href="/logout">Log Out</a>
    </section>
    <section>
        <h1 class="my-4">All posts</h1>
        <h2>Hello, {{session('name')}}! What's on your mind?</h2>
        @foreach($posts as $post)
            <div class="row justify-content-center">
                <div class="col-8 card my-2">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->user->name }}</h3>
                        <p class="card-text">{{ $post['content'] }}</p>
                        @if(session('id') == $post->user->id)
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#edit-post-{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                            Edit this post
                        </button>
                        <div class="collapse" id="edit-post-{{$post->id}}">
                            <form id="" method="POST" action="/posts" style="display: block">
                                @csrf
                                @method('PATCH')
                                <label for="content">
                                    <h3 class="m-0">Edit post</h3>
                                </label>
                                <div class="form-group">
                                    {{ Form::hidden('invisible', $post->id, array('id' => 'id', 'name' => 'id')) }}
                                    <textarea class="form-control" id="content" name="content" rows="1"
                                        placeholder="Post content...">{{ $post['content'] }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                        @endif

                        <h4>Comments</h4>
                        @isset($post->comments)
                            <section class="ml-3">
                                @foreach($post->comments as $comment)
                                    <h5 class="d-inline">
                                        {{ $comment->user->name }}</h5>
                                    <p>{{ $comment['content'] }}</p>
                                @endforeach
                            </section>
                        @endisset
                        @if($post->comments->isEmpty())
                            <p>No comment yet!</p>
                        @endif
                        <form class="form-inline" method="POST" action="/comment">
                            @csrf
                            <label class="sr-only" for="comment">Write a comment</label>
                            <div class="form-group flex-grow-1">
                                {{Form::hidden('invisible', $post->id, array('id' => 'post_id', 'name' => 'post_id')) }}
                                <input class="form-control w-100" id="content" name="content" placeholder="comment..." />
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section>
        <form method="POST" action="/posts">
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
