
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label"> @isset($post) {{$post->title}} @endisset</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Title">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label"> @isset($post) {{$post->description}} @endisset</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
</div>
    
