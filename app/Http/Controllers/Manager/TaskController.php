<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Tasks;

class TaskController extends Controller
{
    //
    public function index() {
        $projects = Project::where('manager_id', auth()->id())->with('tasks')->get();
        return view('manager.tasks.index', compact('projects'));
    }
    public function create() {
        $projects = Project::where('manager_id', auth()->id())->get();
        $developers = User::where('role', 'developer')->get();
        return view('manager.tasks.create', compact('projects', 'developers'));
    }
    public function store(Request $request) {
        $request->validate([
            'title' => 'required', 
            'project_id' => 'required', 
            'developer_id' => 'required']);
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }
}
