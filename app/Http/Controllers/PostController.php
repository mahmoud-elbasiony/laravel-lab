<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // dd("index");

        $posts=[
            [
                'id' => 1,
                'Title' => 'Laravel',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 2,
                'Title' => 'PHP',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 3,
                'Title' => 'Javascript',
                'posted_by' => 'Ali',
                'created_at' => '2022-08-01 10:00:00'
            ],
        ];
        return view("post.index",["posts"=>$posts]);
    }


    public function show(){
        // dd("show");

        $post =  [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description',
        ];
        return view("post.show",["post" => $post]);
    }



    public function create(){
        // dd("create");

        return view("post.create");
    }

    
    public function edit($id){
        // dd("create");

        return view("post.edit",["id"=> $id]);
    }
    
    public function store(){
        // dd("store");
        return redirect()->route('posts.index');
        
    }
    public function destroy(){
        // dd("store");
        return redirect()->route('posts.index');
        
    }
    public function update(){
        // dd("store");
        return redirect()->route('posts.index');
        
    }

}
