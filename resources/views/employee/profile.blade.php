@extends(request()->is('admin/*') ? 'layouts.admin' : 'layouts.employee')

@section('content')

@php
    $isEmployee = Auth::guard('employee')->check();
    $isAdmin = Auth::guard('admin')->check();
@endphp

<style>
    .profile-card {
        border-radius: 14px;
        border: none;
    }
    .profile-header {
        border-bottom: 1px solid #eee;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .profile-header h3 {
        font-weight: 700;
    }
    .form-control {
        border-radius: 8px;
    }
    .form-label {
        font-weight: 600;
        font-size: 14px;
    }
    .update-btn {
        border-radius: 30px;
        padding: 8px 30px;
        font-weight: 600;
    }
    .back-btn {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff !important;
    border: none;
    padding: 6px 18px;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(37, 117, 252, 0.35);
}

.back-btn:hover {
    background: linear-gradient(135deg, #2575fc, #6a11cb);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(106, 17, 203, 0.45);
    color: #fff;
}

.back-btn i {
    font-size: 16px;
}

</style>

<div class="container mt-3" style="max-width: 850px;">
    <div class="card shadow-lg profile-card p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center profile-header">
            <div>
                <h3 class="text-primary mb-0">
                    <i class="bi bi-person-circle me-2"></i> My Profile
                </h3>
                <small class="text-muted">Manage your personal information</small>
            </div>

           <a href="{{ request()->is('admin/*') ? route('admin.employee') : route('employee.dashboard') }}"
   class="btn back-btn btn-sm">
    <i class="bi bi-arrow-left-circle-fill me-1"></i>Back
</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('employee.profile.update') }}" method="POST">
            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ $employee->name }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control"
                        value="{{ $employee->email }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ $employee->phone }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control"
                        value="{{ $employee->gender }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Department</label>
                    <input type="text" class="form-control"
                        value="{{ $employee->department }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control"
                        value="{{ $employee->joining_date }}">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" rows="3"
                        class="form-control">{{ $employee->address }}</textarea>
                </div>

            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success update-btn">
                    <i class="bi bi-save me-1"></i> Update Profile
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
