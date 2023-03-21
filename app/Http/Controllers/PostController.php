<?php
namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Validation\Rule;
use App\Models\comment;
// use Illuminate\Pagination\Paginator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index(){
        // dd(date('Y-m-d H:i:s',rand(1400000000,1670000000)));
        // dd(post::withTrashed()->get());
        // $posts=post::withTrashed()->get();
        
        // // $posts=post::all();
        // foreach($posts as $post){
        //     // $slug=SlugService::createSlug(Post::class, 'slug', $post->title);
        //     // $post->slug=$slug;
        //     // $post->created_at=date('Y-m-d H:i:s',rand(1400000000,1670000000));
        //     $post->restore();


        //     // $post->save();
        // }

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

    
    public function store(StorePostRequest $request){
        // $users=user::select("id")->get()->toArray();

        // dd($users);
        // $request->validate([
        //     "user_id"=>[
        //         Rule::in($users)
        //     ]
        // ]);
        // dd();
        $path = !empty($request->file('image'))?$request->file('image')->store('photos',["disk"=>"public"]):"";
        
        
        post::create([
            "title"=>request()->title,
            "description"=>request()->description,
            "user_id"=>request()->user_id,
            "isDeleted"=>0,
            "photo"=>$path
        ]);
        
        // Storage::put($path, $request->file('image'), 'private');
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
    public function update(StorePostRequest $request,$id){
        $path = !empty($request->file('image'))?$request->file('image')->store('photos',["disk"=>"public"]):"";

        $post = post::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = request()->user_id;
        $post->photo=$path;
        $post->save();
        return redirect()->route('posts.index');
        
    }
    public function restore($id){
        $post = post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('posts.index');
    }
     public function toResponse($id)
    {

        $post = post::find($id);
        $post->user = $post->user;

        return response()
            ->json($post);
    }

}
