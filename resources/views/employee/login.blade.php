@extends('layouts.app')

@section('content')

<div class="card shadow mx-auto" style="max-width: 450px; margin-top: 40px;">
    <div class="card-body">

        <h3 class="text-center text-primary mb-3">Employee Login</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employee.login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="employee@example.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter password">
            </div>

            <button class="btn btn-success w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <p class="text-muted mb-1">Not registered yet?</p>
            <a href="{{ url('/employee/register') }}" class="btn btn-outline-primary btn-sm">Register Here</a>
        </div>

    </div>
</div>

@endsection
