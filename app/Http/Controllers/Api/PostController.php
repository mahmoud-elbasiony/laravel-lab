<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\CommentResource;

class PostController extends Controller
{

    public function index()
    {

        return PostResource::collection(post::with(["user"])->paginate(15));
    }

    public function show($id)
    {

        $post =  post::find($id);
        if (!$post) {
            return response(["error" => "Resource not found"], 403);
        }
        $comments = $post->comments;
        return ["data" => ["post" => new PostResource($post), "comments" =>  CommentResource::collection($comments)]];
    }

    public function store(StorePostRequest $request)
    {

        $path = !empty($request->file('image')) ? $request->file('image')->store('photos', ["disk" => "public"]) : "";
        return post::create([
            "title" => request()->title,
            "description" => request()->description,
            "user_id" => request()->user_id,
            "isDeleted" => 0,
            "photo" => $path
        ]);
    }
}
