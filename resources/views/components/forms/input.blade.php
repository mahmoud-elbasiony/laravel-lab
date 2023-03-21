
<div class="mb-3">
    <label for="inputTitle" class="form-label"> @isset($post) {{$post->title}} @endisset</label>
    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}" placeholder="Title">
</div>
<div class="mb-3">
    <label for="inputDescription" class="form-label"> @isset($post) {{$post->description}} @endisset</label>
    <textarea class="form-control" id="inputDescription" name="description"  rows="3">{{ old('description') }}</textarea>
</div>
<div class="mb-3">
    <label for="inputPhoto" class="form-label">upload image</label>
    <input type="file" id="inputPhoto" name="image">
</div>
    
