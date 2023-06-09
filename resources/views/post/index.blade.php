@extends("layouts.app")
@section('title') posts @endsection
@section('content')
    <a class="btn btn-primary m-4" href="{{route("posts.create")}}">create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">photo</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                <td>{{$post->id}}</td>
                <td><img src="{{Storage::url($post->photo)}}" width="50px" alt="no image"></td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>
                    @if (!$post->trashed())
                            <a class="btn btn-success" href="{{route("posts.show",$post->id)}}">view</a>
                            <a class="btn btn-primary" href="{{route("posts.edit",$post->id)}}">edit</a>
                        @endif
                    <form method="post" class="{{$post->trashed()?'':'delete_post'}}" action="{{$post->trashed()?route("posts.restore",$post->id):route("posts.destroy",$post->id)}}" 
                        style="display:inline-block;;">
                        @csrf
                        @if ($post->trashed())
                            @method("PUT")
                            <button type="submit" class="btn btn-success" id="restore">restore</button>
                        @else
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger" id="delete_{{$post->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">delete</button>
                        @endif
                        
                    </form> 
                    <button type="submit" class="btn btn-success ajax" id="{{route("posts.toResponse",$post->id)}}" >ajax</button>
                    </td>
                    @endforeach
                    
                    
                </tr>
                
            </tbody>
    </table>
    
    {{ $posts->onEachSide(5)->links() }}
@endsection

@section("modal")
    <x-modal />
@endsection
