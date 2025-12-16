<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyWorkReport;

class DailyWorkReportController extends Controller
{
   public function index()
{
    $reports = DailyWorkReport::with('employee')->latest()->get();
    return view('admin.daily_work_report', compact('reports'));
}

    
}
