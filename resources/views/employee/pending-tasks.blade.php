@extends('layouts.employee')

@section('content')

<h3 class="fw-bold text-danger mb-3">Pending Tasks</h3>

<div class="card shadow p-3">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Project</th>
                <th>Task</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->project_name }}</td>
                    <td>{{ $task->task_details }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No pending tasks</td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection
