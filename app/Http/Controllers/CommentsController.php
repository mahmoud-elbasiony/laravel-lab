<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;

class CommentsController extends Controller
{

    public function store(Request $request, $id)
    {
        
        return route('livewire.show-comments',["post"=>post::find($id)]);
        // dd($this);
        
        // return view("show-comments");
    }

    public function destroy($id)
    {
        $post=comment::find($id);
        
        $comment=comment::find($id);
        $comment->delete();
        $post->save();

        dd($post);
        // return route('livewire.show-comments',["post"=>$post]);


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($id);
    }

    
}
