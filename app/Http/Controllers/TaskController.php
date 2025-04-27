<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    //Views
    public function index(Request $req)
    {

        $tasks = Task::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('status', 'public');
        })->get();


        foreach ($tasks as $task) $task->description = strlen($task->description) < 400 ? $task->description : Str::limit($task->description, 400, "...");

        switch ($req->get("query")) {
            case ("private"):
                $tasks = $tasks->where("status", "private");
                break;
            case ("public"):
                $tasks = $tasks->where("status", "public");
                break;
        }

        $isAuth = Auth::check();

        return view("task.index", compact("tasks", "isAuth"));
    }

    public function create()
    {
        return view("task.create");
    }

    public function show(string $id)
    {

        $task = Task::find($id);

        if (!$task) return redirect()->route("task.index.view");

        $user = User::find($task->user_id);

        $isUser = false;

        if (Auth::user()) $isUser =  Auth::user()->id != $user->id ? false : true;

        if (!$isUser && $task->status === "private") return redirect()->route("task.index.view");

        return view("task.show", compact("task", "user", "isUser"));
    }

    public function edit(string $id)
    {
        $task = Task::find($id);

        if (!$task) return redirect()->route("task.index.view");

        return view("task.edit", compact('task'));
    }

    //functionality
    public function store(Request $req)
    {
        $user = Auth::user();

        $validate = $req->validate(
            [
                "title" => "required|string|max:255",
                "description" => "string"
            ]
        );

        Task::create(
            [
                "title" => $validate["title"],
                "description" => $validate["description"],
                "status" => $req->status,
                "user_id" => $user->id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        );

        return redirect()->route("task.index.view");
    }

    public function update(Request $req)
    {
        $task = Task::find($req->id);



        $validate = $req->validate(
            [
                "title" => "required|string|max:255",
                "description" => "string"
            ]
        );

        $task->update(
            [
                "title" => $validate["title"],
                "description" => $validate["description"],
                "status" => $req->status,
                "updated_at" => Carbon::now()
            ]
        );

        return redirect()->route("task.show.view", $task->id);
    }

    public function destroy(string $id)
    {
        $task = Task::find($id);

        Task::destroy($id);

        return redirect()->route("task.index.view");
    }
}
