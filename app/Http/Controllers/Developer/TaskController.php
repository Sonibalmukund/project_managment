<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index() {
        $tasks = Task::where('developer_id', auth()->id())->get();
        return view('developer.tasks.index', compact('tasks'));
    }
    public function updateStatus(Request $request, Task $task) {
        $task->update(['status' => $request->status]);
        return back();
    }
}
