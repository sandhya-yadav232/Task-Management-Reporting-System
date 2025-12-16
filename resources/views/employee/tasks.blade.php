@extends('layouts.employee')

@section('content')

<h3 class="fw-bold text-primary mb-3">My Tasks</h3>

<div class="card shadow p-3">

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Project Name</th>
                <th>Assign Date</th>
                <th>Deadline</th>
                <th>Task Details</th>
                <th>Employee Update</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
            <tr>
                <td>{{ $task->project_name ?? $task->task_name }}</td>
                <td>{{ \Carbon\Carbon::parse($task->assign_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</td>
                <td>{{ $task->task_details }}</td>
                <td>
                   <a href="{{ route('employee.daily_work', $task->id) }}" class="btn btn-primary btn-sm">
    Update
</a>

             
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No tasks assigned yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

@endsection
