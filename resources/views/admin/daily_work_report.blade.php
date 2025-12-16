@extends('layouts.admin')
@section('content')

<div class="page-header">
    <h2 class="fw-bold"><i class="bi bi-journal-text me-2"></i> Daily Work Reports</h2>
</div>

<div class="card p-3 shadow-sm">
    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Project Name</th>
                <th>Assign Date</th>
                <th>Work Summary</th>
                <th>File</th>
            </tr>
        </thead>

        <tbody>
            @forelse($reports as $report)
            <tr>
                <td>{{ $report->employee->name }}</td>
                <td>{{ $report->date }}</td>
                <td>{{ $report->project_name }}</td>
                <td>{{ $report->assign_date }}</td>
                <td>{{ $report->employee_update }}</td>
                <td>
                    @if($report->file_path)
<a href="{{ asset('storage/' . $report->file_path) }}" class="btn btn-sm btn-primary" target="_blank">
    Download
</a>
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No reports found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
