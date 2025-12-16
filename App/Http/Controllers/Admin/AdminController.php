<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Task;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalEmployees = Employee::count();
        $pendingTasks = Task::where('status', 'Pending')->count();
        $completedTasks = Task::where('status', 'Completed')->count();
        $recentActivities = Task::latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totalEmployees',
            'pendingTasks',
            'completedTasks',
            'recentActivities'
        ));
    }

    public function tasks_assign()
    {
        $employees = Employee::all();
        return view('admin.tasks_assign', compact('employees'));
    }

    public function daily_work_report()
    {
        return view('admin.daily_work_report');
    }

    public function employee()
    {
        $employees = Employee::all();
        return view('admin.employee', compact('employees'));
    }

    public function registerForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered!');
    }

    public function viewEmployeeProfile($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.profile', compact('employee'));
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employee')
                        ->with('success', 'Employee deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => 'required|exists:employees,id',
            'project_name' => 'required|string',
            'assign_date'  => 'required|date',
            'deadline'     => 'required|date',
            'task_details' => 'required|string',
        ]);

        Task::create([
            'employee_id'  => $request->employee_id,
            'project_name' => $request->project_name,
            'assign_date'  => $request->assign_date,
            'deadline'     => $request->deadline,
            'task_details' => $request->task_details,
            'status'       => 'Pending',
        ]);

        return back()->with('success', 'Task Assigned Successfully!');
    }

    public function updateTaskStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function tasks_overview()
{
    $tasks = Task::with('employee')->orderBy('assign_date', 'desc')->get();
    return view('admin.tasks_overview', compact('tasks'));
}

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $employees = Employee::all();

        return view('admin.edit-task', compact('task', 'employees'));
    }

    public function updateTask(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'project_name' => 'required|string|max:255',
            'task_details' => 'required|string',
            'assign_date' => 'required|date',
            'deadline' => 'required|date',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'employee_id' => $request->employee_id,
            'project_name' => $request->project_name,
            'task_details' => $request->task_details,
            'assign_date' => $request->assign_date,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('admin.tasks_overview')->with('success', 'Task updated successfully!');
    }

    // Show employee registration form to admin
public function createEmployee()
{
    return view('admin.employee-register'); // create this view
}

// Store employee
public function storeEmployee(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'department' => 'required',
        'joining_date' => 'required|date',
        'password' => 'required|min:6|confirmed',
    ]);

    Employee::create([
        'name' => $request->name,
        'email' => $request->email,
        'department' => $request->department,
        'joining_date' => $request->joining_date,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.employee')->with('success', 'Employee added successfully!');
}

}
