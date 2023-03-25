<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    public function edit($id)
    {

        return view("user.edit");
    }
    public function update($id)
    {
        $AuthUser = Auth::user();
        $user = user::find($id);
        if ($AuthUser->id == $id) {
            $user->name = request()->name;
            $user->save();
        } else {
            return view("error.unauthorized_request");
        }
        return redirect()->route('posts.index');
    }

    public function githubLogin()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where("email", $githubUser->email)->first();
        // dd($user);

        if (!$user) {

            $user = User::updateOrCreate([
                'github_id' => $githubUser->id,
            ], [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
    public function googleLogin()
    {
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser);
        $user = User::where("email", $googleUser->email)->first();
        if (!$user) {
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
