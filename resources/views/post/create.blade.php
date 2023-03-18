@extends("layouts.app")
@section("title") create @endsection
@section("content")
<form method="post" action="{{route("posts.store")}}">
@csrf
<?php $c="create"; ?>
    <x-forms.input />
    <x-button color="primary" :value="$c" />
</form>

@endsection