@extends("layouts.app")
@section('title') posts @endsection
@section('content')
    <a class="btn btn-primary m-4" href="{{route("posts.create")}}">create</a>
        <table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
        <th scope="row">{{$post["id"]}}</th>
        <td>{{$post["Title"]}}</td>
        <td>{{$post["posted_by"]}}</td>
        <td>{{$post["created_at"]}}</td>
        <td>
            <a class="btn btn-success" href="{{route("posts.show",$post["id"])}}">view</a>
            <a class="btn btn-primary" href="{{route("posts.edit",$post["id"]),"/edit"}}">edit</a>
            <a class="btn btn-danger" href="">delete</a>
        </td>
        @endforeach
        </tr>
        
    </tbody>
    </table>

@endsection