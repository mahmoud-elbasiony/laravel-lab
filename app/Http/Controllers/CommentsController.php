<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;

class CommentsController extends Controller
{

    public function store(Request $request, $id)
    {
        post::find($id)->comments()->create([
            "body"=>request()->body
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        dd($id);
        comment::find($id)->delete();

        return redirect(null);
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
    public function update(Request $request, string $id)
    {
        //
    }

    
}
