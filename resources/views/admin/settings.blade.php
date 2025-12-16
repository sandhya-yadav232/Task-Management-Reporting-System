@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h2 class="fw-bold"><i class="bi bi-gear me-2"></i> Settings</h2>
</div>

<div class="card p-4 shadow-sm">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <!-- Dark Mode -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold">Dark Mode</span>
            <label class="switch">
                <input type="checkbox" name="dark_mode" {{ $admin->dark_mode ? 'checked' : '' }}>
                <span class="slider round"></span>
            </label>
        </div>

        <!-- Sidebar Mode -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold">Compact Sidebar</span>
            <label class="switch">
<input type="checkbox" name="compact_sidebar" {{ $admin->compact_sidebar ? 'checked' : '' }}>
                <span class="slider round"></span>
            </label>
        </div>

        <!-- Stats -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold">Show Dashboard Stats</span>
            <label class="switch">
<input type="checkbox" name="show_stats" {{ $admin->show_stats ? 'checked' : '' }}>
                <span class="slider round"></span>
            </label>
        </div>

        <button class="btn btn-primary w-100 mt-3">Save Settings</button>
    </form>
</div>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

.switch input { display:none; }

.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0;
  right: 0; bottom: 0;
  background-color: #ccc;
  transition: .3s;
  border-radius: 24px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: .3s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #0d6efd;
}

input:checked + .slider:before {
  transform: translateX(26px);
}
</style>

@endsection
