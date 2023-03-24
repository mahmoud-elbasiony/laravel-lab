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
            <p class="card-text">Created at: {{$post->humanReadableDate}}</p>


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

    @livewire('show-comments',['post' => $post ,"comments"=>$comments])
    @livewireScripts
    
@endsection