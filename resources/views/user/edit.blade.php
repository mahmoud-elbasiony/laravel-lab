@extends("layouts.app")
@section("title") create @endsection
@section("content")
@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route("users.update",Auth::user()->id)}}" enctype="multipart/form-data">
@csrf
@method("PUT")
<?php $c="update"; ?>
    <div class="mb-3">
        <label for="name" class="form-label"> Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label"> Email</label>
        <input class="form-control" id="email"  rows="3" value="{{Auth::user()->email}}" disabled></input>
    </div>
    <div class="mb-3">
        <label for="inputPhoto" class="form-label">upload image</label>
        <input type="file" id="inputPhoto" name="image">
    </div>
    <x-button color="primary" :value="$c" />
</form>

@endsection