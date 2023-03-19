@extends('layouts.app')

@section('title') Show @endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header bg-secondary text-light">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            <p class="card-text">Created at: {{$post->created_at->format('l jS \of F Y h:i:s A')}}</p>

        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-secondary text-light">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user->name}}</h5>
            <p class="card-text">Email: {{$post->user->email}}</p>
        </div>
    </div>

    <form method="post" class="mt-4" action="{{route("comments.store",$post->id)}}">
        @csrf
        <div class="card mb-4">
            <div class="card-header bg-secondary text-light">
                comment on post
            </div>
            <div class="card-body">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3" ></textarea>
            </div>
        </div>
        <x-button color="primary" value="send" />
    </form>
    
    <div class="card my-4">
    <div class="card-header bg-secondary text-light">
            comments
    </div>
    @foreach($comments as $comment)
    <div class="card m-2">
        
        <div class="card-body bg-dark-subtle">

            <p class="card-text">{{$comment->body}}</p>
            <p class="card-text">{{$comment->created_at}}</p>

        </div>
    </div>

    @endforeach
    </div>

@endsection