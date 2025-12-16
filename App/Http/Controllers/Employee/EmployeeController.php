<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\DailyWork;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.register');
    }
public function register(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'required|string|max:20',
        'gender' => 'required|in:Male,Female,Other',
        'department' => 'required|string|max:100',
        'joining_date' => 'required|date',
        'password' => 'required|confirmed',
        'address' => 'required|string|max:255',
    ]);

    // Employee create
    $employee = \App\Models\Employee::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'department' => $request->department,
        'joining_date' => $request->joining_date,
        'address' => $request->address,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);

    // Auto login employee
    \Illuminate\Support\Facades\Auth::guard('employee')->login($employee);

    return redirect()->route('employee.dashboard')
                     ->with('success', 'Registration successful!');
}

    public function loginForm()
    {
        return view('employee.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('employee')->attempt($request->only('email', 'password'))) {
        return redirect()->route('employee.dashboard')->with('success', 'Login successful!');
    }

    return back()->withErrors(['email' => 'Invalid email or password']);
}

    public function dashboard()
    {
        $employee = Auth::guard('employee')->user();
        $tasks = Task::where('employee_id', $employee->id)->get();
        $reports = DailyWork::where('employee_id', $employee->id)->latest()->take(5)->get();

        return view('employee.dashboard', compact('employee', 'tasks', 'reports'));
    }

    public function tasks()
    {
        $tasks = Task::where('employee_id', Auth::guard('employee')->id())->get();
        return view('employee.tasks', compact('tasks'));
    }

  public function todayTasks()
{
    $employeeId = auth()->guard('employee')->id();

    $today = date('Y-m-d');

    $tasks = Task::where('employee_id', $employeeId)
                 ->where('assign_date', $today)
                 ->get();

    return view('employee.today-tasks', compact('tasks'));
}


   public function completedTasks()
{
    $employeeId = auth()->guard('employee')->id();

    $tasks = Task::where('employee_id', $employeeId)
                 ->where('status', 'completed')
                 ->orderBy('updated_at', 'desc')
                 ->get();

    return view('employee.completed-tasks', compact('tasks'));
}
    public function dailyWorkForm()
    {
        return view('employee.daily_work');
    }

    public function submitDailyWork(Request $request)
    {
        return back()->with('success', 'Daily work submitted successfully!');
    }

    public function profile()
    {
        $employee = Auth::guard('employee')->user();
        return view('employee.profile', compact('employee'));
    }

    public function profileUpdate(Request $request)
    {
        $employee = Auth::guard('employee')->user();

        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'gender'     => 'nullable|string',
            'department' => 'nullable|string',
            'joining_date'=> 'nullable|date',
            'address'    => 'nullable|string',
        ]);

        $employee->update($request->all());

        return back()->with('success', 'Profile updated successfully!');
    }

    public function pendingTasks()
{
    $employee = Auth::guard('employee')->user();

    // Employee ke saare pending status wale tasks
    $tasks = \App\Models\Task::where('employee_id', $employee->id)
                ->where('status', 'pending')
                ->orderBy('deadline', 'asc')
                ->get();

    return view('employee.pending-tasks', compact('tasks'));
}

public function logout()
{
    Auth::guard('employee')->logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect()->route('employee.login')
                     ->with('success', 'Logged out successfully!');
}


}
