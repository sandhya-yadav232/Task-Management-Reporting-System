@extends('layouts.employee')

@section('content')

<h3 class="fw-bold text-primary mb-3">Daily Work Report</h3>

<div class="card shadow p-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<form action="{{ route('employee.daily_work.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="fw-bold">Date</label>
                <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="fw-bold">Project Name</label>
                <input type="text" class="form-control" name="project_name" placeholder="Project name">
            </div>

            <div class="col-md-6 mb-3">
                <label class="fw-bold">Assign Date</label>
                <input type="date" class="form-control" name="assign_date">
            </div>

            <div class="col-md-12 mb-3">
                <label class="fw-bold">Employee Update</label>
                <textarea class="form-control" name="employee_update" rows="3" placeholder="Describe today’s work..."></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label class="fw-bold">Upload Screenshot / File</label>
                <input type="file" class="form-control" name="file">
            </div>

        </div>

        <button class="btn btn-success w-100">Submit</button>

    </form>
</div>

@endsection
