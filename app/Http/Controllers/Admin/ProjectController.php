<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        $projects = Project::with('manager')->get();
        return view('admin.projects.index', compact('projects'));
    }
    public function create() {
        $managers = User::where('role', 'manager')->get();
        return view('admin.projects.create', compact('managers'));
    }
    public function store(Request $request) {
        $request->validate(['name' => 'required', 'manager_id' => 'required']);
        Project::create($request->all());
        return redirect()->route('projects.index');
    }
}
