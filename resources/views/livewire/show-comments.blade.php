<div>
@livewireStyles

    <form method="post" class="mt-4" wire:submit.prevent="submitComment" action="{{route("comments.store",$post->id)}}">
        @csrf
        <div class="card mb-4">
            <div class="card-header bg-secondary text-light">
                comment on post
            </div>
            <div class="card-body">
                <textarea class="form-control @error("comment") border-danger is-invalid @enderror" wire:model="comment" id="exampleFormControlTextarea1" name="body" rows="3" ></textarea>
                @error('comment') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-button color="primary" value="send" />
    </form>
    <div class="card my-4">
        <div class="card-header bg-secondary text-light">
                comments
        </div>
    </div>

    @foreach($comments as $comment)
    {{-- @dd($comments) --}}
    <x-comment-body :comment="$comment" />
    @endforeach
</div>
