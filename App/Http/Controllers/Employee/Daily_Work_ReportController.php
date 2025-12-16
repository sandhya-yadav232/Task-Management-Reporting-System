<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyWorkReport;
use Illuminate\Support\Facades\Auth;

class Daily_Work_ReportController extends Controller
{
    // =====================
    // SHOW DAILY WORK FORM
    // =====================
    public function create()
    {
        return view('employee.daily_work');
    }

    // =====================
    // STORE DAILY WORK
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'project_name' => 'required',
            'assign_date' => 'required',
            'employee_update' => 'required',
            'file' => 'nullable|mimes:jpg,png,pdf,doc,docx,xlsx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('reports', 'public');
        } else {
            $filePath = null;
        }

        DailyWorkReport::create([
            'employee_id' => auth()->guard('employee')->id(),
            'date' => $request->date,
            'project_name' => $request->project_name,
            'assign_date' => $request->assign_date,
            'employee_update' => $request->employee_update,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully');
    }
}
