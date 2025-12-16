@extends('layouts.admin')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<div class="page-header">
    <h2 class="fw-bold"><i class="bi bi-clipboard-plus me-2"></i> Assign Task</h2>
</div>

<div class="card shadow-sm p-4">

    <form action="{{ route('admin.task.store') }}" method="POST">
    @csrf

    <label class="fw-bold">Select Employee</label>
    <select class="form-select mb-3" name="employee_id">
        <option selected disabled>Choose Employee</option>
     @foreach($employees as $emp)
    <option value="{{ $emp->id }}">{{ $emp->name }}</option>
@endforeach


  <label class="fw-bold d-block mb-2">Task Title</label>
<input type="text" name="project_name" class="form-control mb-3" placeholder="Enter Task Title">

    <div class="row">
        <div class="col-md-6">
            <label class="fw-bold">Assign Date</label>
            <input type="date" name="assign_date" class="form-control mb-3">
        </div>
        <div class="col-md-6">
            <label class="fw-bold">Deadline</label>
            <input type="date" name="deadline" class="form-control mb-3">
        </div>
    </div>

   <label class="fw-bold">Task Details</label>
<textarea class="form-control mb-3" name="task_details" rows="3"></textarea>

    <button class="btn btn-success w-100">Assign Task</button>
</form>


</div>

@endsection
