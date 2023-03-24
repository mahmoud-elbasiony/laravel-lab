<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;


class UserController extends Controller
{
    public function edit($id){

        return view("user.edit");
        
    }
    public function update($id){
        $AuthUser = Auth::user();
        $user=user::find($id);
        if($AuthUser->id==$id){
            $user->name=request()->name;
            $user->save();
        }else{
            return view("error.unauthorized_request");
        }
        return redirect()->route('posts.index');
        
    }
}
