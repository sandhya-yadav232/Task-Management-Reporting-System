@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h2 class="fw-bold"><i class="bi bi-card-checklist me-2"></i> Task Overview</h2>
</div>

<div class="card shadow-sm p-3">

    <table class="table table-bordered table-hover">
        <thead class="table-info">
            <tr>
                <th>Employee</th>
                <th>Project Name</th>
                <th>Task</th>
                <th>Assign Date</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Edit</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
           <tr>
<td>{{ $task->employee->name ?? 'Unknown Employee' }}</td>
    <td>{{ $task->project_name }}</td>
    <td>{{ $task->task_details }}</td>
    <td>{{ $task->assign_date }}</td>
    <td>{{ $task->deadline }}</td>

    <td>
        <form action="{{ route('admin.updateTaskStatus', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </form>
    </td>

    <td>
        <a href="{{ route('admin.editTask', $task->id) }}" class="btn btn-sm btn-primary">
            Edit
        </a>
    </td>
</tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection
