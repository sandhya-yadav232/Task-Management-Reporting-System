@extends('layouts.admin')

@section('content')

<div class="card shadow p-4" style="max-width:500px; margin:auto;">
    <h3 class="mb-3 text-primary fw-bold">Admin Profile</h3>

    <p><strong>Name:</strong> {{ $admin->name }}</p>
    <p><strong>Email:</strong> {{ $admin->email }}</p>

    <a href="/admin/dashboard" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>

@endsection
