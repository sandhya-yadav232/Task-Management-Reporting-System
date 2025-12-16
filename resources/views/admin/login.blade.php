@extends('layouts.app')

@section('content')

<style>
    body {
        background: #f5f6fa;
    }
    .admin-login-card {
        max-width: 420px;
        margin: 60px auto;
        padding: 30px;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        animation: fadeIn 0.4s ease-in-out;
    }
    .admin-login-card h3 {
        font-weight: 700;
        color: #4e73df;
    }
    .admin-login-card .form-control {
        height: 48px;
        border-radius: 10px;
    }
    .btn-login {
        height: 48px;
        font-weight: 600;
        border-radius: 10px;
        background: #4e73df;
        border: none;
    }
    .btn-login:hover {
        background: #3657c5;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="admin-login-card">

    <div class="text-center mb-4">
        <i class="bi bi-shield-lock-fill text-primary" style="font-size: 45px;"></i>
        <h3 class="mt-2">Admin Login</h3>
        <p class="text-muted">Sign in to access your dashboard</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-success w-100 btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
        </button>

    </form>

</div>

@endsection
