@extends('layouts.employee')

@section('content')

<h3 class="fw-bold text-success mb-3">Completed Tasks</h3>

<div class="card shadow p-3">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Project</th>
                <th>Task</th>
                <th>Completed On</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tasks as $task)
            <tr>
                <td>{{ $task->project_name }}</td>
                <td>{{ $task->task_details }}</td>
                <td>{{ $task->updated_at->format('Y-m-d') }}</td>
                <td><span class="badge bg-success">Completed</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">No completed tasks</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
