@extends('layouts.admin')
@section('content')

<div class="card p-4 shadow-sm">
    <h4>Add New Employee</h4>

    <form action="{{ route('admin.employee.store') }}" method="POST">
        @csrf

        <div class="mb-3"><label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3"><label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3"><label>Department</label>
            <input type="text" name="department" class="form-control" required>
        </div>

        <div class="mb-3"><label>Joining Date</label>
            <input type="date" name="joining_date" class="form-control" required>
        </div>

        <div class="mb-3"><label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3"><label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Employee</button>
        <a href="{{ route('admin.employee') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
