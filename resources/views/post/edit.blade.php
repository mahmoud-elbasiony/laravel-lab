@extends("layouts.app")
@section("title") update @endsection
@section("content")
<form method="post" action="{{route("posts.update",$post->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" >Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Title" value="@isset($post) {{$post->title}} @endisset">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" >@isset($post) {{$post->description}} @endisset</textarea>
    </div>
    <label for="exampleFormControlInput1" class="form-label">Post creator</label>
        
    <select class="form-select form-select-lg mb-3" id="exampleFormControlInput1" aria-label=".form-select-lg example" name="user_id">
    @foreach ($users as $user)
        <option  value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
    </select>
    <x-button color="primary" value="update" />
</form>

@endsection