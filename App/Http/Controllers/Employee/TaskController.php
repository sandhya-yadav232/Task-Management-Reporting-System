<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task; // ✅ Ye zaruri hai

class TaskController extends Controller
{
public function index()
{
    // Example: all tasks list
    $tasks = \App\Models\Task::where('employee_id', auth()->guard('employee')->id())
                ->latest()
                ->get();

    return view('employee.tasks', compact('tasks'));
}

    public function myTasks()
    {
        $tasks = Task::where('employee_id', Auth::id())->get();
        return view('employee.tasks', compact('tasks'));
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'employee_update' => $request->employee_update
        ]);

        return back()->with('success', 'Update saved!');
    }
}
