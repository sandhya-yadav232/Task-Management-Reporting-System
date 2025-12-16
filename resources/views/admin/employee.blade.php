@extends('layouts.admin')
@section('content')

<style>
    .employee-card {
        border-radius: 10px;
        border: none;
    }
    .employee-table thead {
        background: linear-gradient(90deg, #0d6efd, #4ba3ff);
        color: white;
        font-size: 15px;
        letter-spacing: .5px;
    }
    .employee-table tbody tr:hover {
        background: #f5f9ff;
        transition: 0.2s;
    }
    .btn-primary, .btn-danger, .btn-success {
        border-radius: 6px;
        padding: 5px 12px;
    }
</style>

<div class="page-header d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold mb-0">
        <i class="bi bi-people me-2"></i> Employees
    </h2>

    <!-- Add Employee Button -->
   <a href="{{ route('admin.employee.create') }}" class="btn btn-success shadow-sm">
    <i class="bi bi-plus-circle me-2"></i> Add New Employee
</a>

</div>

<div class="card shadow employee-card p-3">

    <table class="table table-bordered table-striped">
      <thead class="table-secondary">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Joining Date</th>
        <th>Action</th>
    </tr>
</thead>


        <tbody>
            @foreach($employees as $index => $emp)
            <tr>
                <td class="fw-bold">{{ $index + 1 }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->department }}</td>
                <td>{{ $emp->joining_date }}</td>

                <td>
                    <!-- View Button -->
                    <a href="{{ route('admin.employee.profile', $emp->id) }}" 
                       class="btn btn-sm btn-secondary">
                        <i class="bi bi-eye"></i> View</a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.employee.delete', $emp->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" 
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this employee?')">
                            <i class="bi bi-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
