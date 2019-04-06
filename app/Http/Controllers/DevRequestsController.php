<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevRequestsController extends Controller
{
    public function create(\App\Task $task)
    {
        $user = Auth::user();

        if ($user->devRequests->where('task_id', $task->id)->all()) {
            session()->flash('message', 'You already send request for this task!');
            return back();
        }

        if (\App\DevRequest::where([
                ['from', '=', $user->id],
                ['task_id', '=', $task->id]
            ])->first()) {
            session()->flash('message', 'You are creator of this task!');
            return back();
        }

        $devRequest = new \App\DevRequest();
        $devRequest->from = $user->id;
        $devRequest->task_id = $task->id;
        $devRequest->save();

        session()->flash('message', 'Request has been created!');
        return back();
    }

    public function acceptRequest(\App\DevRequest $devRequest)
    {
        if (!Auth::user()->checkIfOwnTask($devRequest->task->id)) {
            return abort(403);
        }

        $devRequest->accepted = true;
        $devRequest->save();

        session()->flash('message', 'Request has been accetped!');
        return back();
    }
}
