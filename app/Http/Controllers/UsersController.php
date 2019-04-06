<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile')->withUser($user);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'bio' => 'required|string|max:5000',
            'skills' => 'required|string|max:1000',
            'img' => 'nullable|url|string|max:255'
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->img = $request->input('img');

        $skillsArray = explode(',', $request->input('skills'));
        $skilsAsJson = \json_encode($skillsArray);
        $user->skills_json = $skilsAsJson;
        $user->save();

        session()->flash('message', 'Your data have been updated');
        return back();
    }

    public function search(Request $request)
    {

        $searchQuery = $request->input('q');

        if ($searchQuery){

            $users = \App\User::where('email', 'like', '%'.$searchQuery.'%')
                ->orWhere('name', 'like', '%'.$searchQuery.'%')
                ->orWhere('skills_json', 'like', '%'.$searchQuery.'%')
                ->orWhere('bio', 'like', '%'.$searchQuery.'%')
                ->get();

        } else {

            $users = \App\User::all();

        }

        return view('users')->withUsers($users);

    }

    public function show(\App\User $user)
    {
        return view('user')->withUser($user);
    }
}
