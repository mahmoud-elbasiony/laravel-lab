<div>
    <div class="card m-2">
        <div class="card-body bg-dark-subtle">
    {{-- @dd($comment) --}}

            <p class="card-text">{{$comment->body}}</p>
            <p class="card-text">{{$comment->created_at}}</p>

        </div>
        <div class="d-flex">
            <form method="post" wire:submit.prevent="deleteComment({{$comment->id}})" action="{{route("comments.destroy",$comment->id)}}" @class(['m-2', 'font-bold' => true])>
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" >delete</button>
            </form>
            <form method="post" action="{{route("comments.destroy",$comment->id)}}" @class(['m-2', 'font-bold' => true])>
                @csrf
                @method("PUT")
                <button type="submit" class="btn btn-primary" >edit</button>
            </form>
        </div>
    </div>
</div>