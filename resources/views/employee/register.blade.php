@extends('layouts.app')

@section('content')

<style>
    .reg-card {
        border-radius: 15px;
        padding: 25px;
        background: #ffffff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.12);
    }
    .form-label {
        font-weight: 600;
    }
</style>

<div class="container mt-4" style="max-width: 650px;">
    <div class="reg-card">

        <h3 class="text-center mb-3 text-primary fw-bold">Employee Registration</h3>
        <!-- SUCCESS -->

{{-- VALIDATION ERRORS --}}
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<form method="POST" action="{{ route('employee.register.submit') }}">

            @csrf

            <h5 class="fw-bold mb-3 text-secondary">Personal Information</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="employee@example.com">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="99999-88888">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender">
                        <option>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>

            <hr>

            <h5 class="fw-bold mb-3 text-secondary">Company Details</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department">
                        <option>Select Department</option>
                        <option>IT</option>
                        <option>HR</option>
                        <option>Sales</option>
                        <option>Designing</option>
                        <option>Support</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" type="date">
                </div>

            </div>

            <hr>

            <h5 class="fw-bold mb-3 text-secondary">Login Details</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                </div>
            </div>

            <hr>

            <h5 class="fw-bold mb-3 text-secondary">Address</h5>

            <div class="mb-3">
                <label class="form-label">Full Address</label>
                <textarea class="form-control" name="address" rows="2" placeholder="Enter complete address"></textarea>
            </div>

            <button class="btn btn-success w-100 fw-bold mt-3">Register</button>

        </form>
         <!-- Already Registered -->
        <div class="text-center mt-3">
            <p class="mb-1 text-muted">Already Registered?</p>
            <a href="{{ url('/employee/login') }}" class="btn btn-outline-primary btn-sm px-4">
                Login Here
            </a>
        </div>

    </div>
</div>

    </div>
</div>

@endsection
