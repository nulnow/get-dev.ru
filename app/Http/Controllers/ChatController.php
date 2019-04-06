<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function _group_by($array, $key) {
    $return = array();
    foreach($array as $val) {
        $return[$val[$key]][] = $val;
    }
    return $return;
}

class ChatController extends Controller
{
    public function chat(\App\User $user)
    {
        return view('chat')->withYou(Auth::user())->withNotYou($user);
    }

    public function messages(\App\User $notYou)
    {
        $user = Auth::user();

        $messages = \App\Message::where([
            ['from', '=', $user->id],
            ['to', '=', $notYou->id]
        ])
            ->orWhere([
                ['to', '=', $user->id],
                ['from', '=', $notYou->id]
            ])
            ->orderBy('id')
            ->get();

        return $messages;
    }

    public function sendMessage(\App\User $notYou, Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255'
        ]);

        $user = Auth::user();

        $message = new \App\Message();
        $message->from = $user->id;
        $message->to = $notYou->id;
        $message->text = $request->input('text');
        $message->save();

        return $message;
    }
}
