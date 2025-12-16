@extends('layouts.employee')

@section('content')

<h3 class="fw-bold text-primary mb-3">Today's Assigned Tasks</h3>

<div class="card shadow p-3">

<table class="table table-striped">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Assign Date</th>
            <th>Deadline</th>
            <th>Task Details</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse($tasks as $task)
        <tr>
            <td>{{ $task->project_name }}</td>
            <td>{{ $task->assign_date }}</td>
            <td>{{ $task->deadline }}</td>
            <td>{{ $task->task_details }}</td>
            <td>
                <span class="badge 
                    @if($task->status == 'pending') bg-warning 
                    @elseif($task->status == 'in-progress') bg-info 
                    @else bg-success 
                    @endif">
                    {{ ucfirst($task->status) }}
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">No tasks assigned today</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>

@endsection
