@extends("layouts.app")
@section("title") create @endsection
@section("content")
<form method="post" action="{{route("posts.store")}}">
@csrf
<?php $c="create"; ?>
    <x-forms.input />
    <label for="exampleFormControlInput1" class="form-label">Post creator</label>
        
        <select class="form-select form-select-lg mb-3" id="exampleFormControlInput1" aria-label=".form-select-lg example" name="user_id">
        @foreach ($users as $user)
            <option  value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    <x-button color="primary" :value="$c" />
</form>

@endsection