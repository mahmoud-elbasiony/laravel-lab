@extends("layouts.app")
@section("title") create @endsection
@section("content")
<form method="post" action="{{route("posts.store")}}">
@csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="Title" placeholder="name@example.com">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="Description" rows="3"></textarea>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Post creator</label>
    <input type="text" class="form-control" name="Post creator" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <button type="submit" class="btn btn-primary">create</button>
</form>

@endsection