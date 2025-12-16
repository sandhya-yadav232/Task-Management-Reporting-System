@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h2 class="fw-bold">Edit Task</h2>
</div>

<div class="card p-4 shadow-sm">
    <form action="{{ route('admin.updateTask', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Employee</label>
            <select name="employee_id" class="form-select">
                @foreach ($employees as $emp)
                    <option value="{{ $emp->id }}" {{ $task->employee_id == $emp->id ? 'selected' : '' }}>
                        {{ $emp->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <input type="text" name="project_name" class="form-control" value="{{ $task->project_name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Task Details</label>
            <textarea name="task_details" class="form-control">{{ $task->task_details }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Assign Date</label>
            <input type="date" name="assign_date" class="form-control" value="{{ $task->assign_date }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
        </div>

        <button class="btn btn-success">Update Task</button>
    </form>
</div>

@endsection
