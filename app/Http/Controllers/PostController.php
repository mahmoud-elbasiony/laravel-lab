<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;
use App\Models\comment;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(){
        // dd(post::withTrashed()->get());
        $posts=post::withTrashed()->get();
        Paginator::useBootstrapFive();
        return view("post.index",["posts"=>post::withTrashed()->paginate(15)]);
    }


    public function show($id){
        // dd("show");
        $post =  post::find($id);
        $comments = $post->comments;
        // dd($comments);
        return view("post.show",["post" => $post,"comments"=>$comments]);
    }



    public function create(){
        // dd("create");
        $users=user::all();

        return view("post.create",["users"=>$users]);
    }

    
    public function store(Request $request){
        
        post::create([
            "title"=>request()->title,
            "description"=>request()->description,
            "user_id"=>request()->user_id,
            "isDeleted"=>0,

        ]);
        return redirect()->route('posts.index');
        
    }

    public function edit($id){
        // dd("create");
        $post =  post::find($id);
        $users=user::all();

        return view("post.edit",["post"=> $post,"users"=>$users ]);
    }
    
    public function destroy($id){
        // dd("store");
        $post=post::find($id);
        // dd($post);
        $post->delete();
        return redirect()->route('posts.index');
        
    }
    public function update(Request $request,$id){
        // dd($id,request()->all());
        $post = post::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = request()->user_id;
        $post->save();
        return redirect()->route('posts.index');
        
    }
    public function restore($id){
        $post = post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('posts.index');
    }

}
