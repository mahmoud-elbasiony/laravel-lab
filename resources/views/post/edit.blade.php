@extends("layouts.app")
@section("title") update @endsection
@section("content")
<form method="post" action="{{route("posts.update",$id)}}">
    @csrf
    @method('PUT')
    <x-forms.input />
    <x-button color="primary" value="update" />
</form>

@endsection