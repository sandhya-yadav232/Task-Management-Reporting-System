<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMRS - Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
<div class="d-flex">

    <!-- ================= SIDEBAR ================= -->
    <div class="sidebar">
        <h3 class="logo">TMRS Employee</h3>

        <a href="{{ route('employee.dashboard') }}" class="item"><i class="bi bi-house"></i> Dashboard</a>
        <a href="{{ route('employee.profile') }}" class="item"><i class="bi bi-person-circle"></i> My Profile</a>
        <a href="{{ route('employee.tasks') }}" class="item"><i class="bi bi-list-task"></i> My Tasks</a>
        <a href="{{ route('employee.daily_work') }}" class="item"><i class="bi bi-journal-check"></i> Daily Work Report</a>
        <a href="{{ route('employee.todayTasks') }}" class="item"><i class="bi bi-calendar-day"></i> Today’s Tasks</a>
        <a href="{{ route('employee.pendingTasks') }}" class="item"><i class="bi bi-hourglass-split"></i> Pending Tasks</a>
        <a href="{{ route('employee.completedTasks') }}" class="item"><i class="bi bi-check2-circle"></i> Completed Tasks</a>

      <form action="{{ route('employee.logout') }}" method="POST">
    @csrf
    <button class="logout btn w-100 text-start text-white border-0 bg-transparent">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>

    </div>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="main-content">

        <!-- WELCOME BANNER -->
        <div class="dashboard-header mb-4">
         <h3 class="fw-bold mb-0">Welcome, {{ $employee->name }} 👋</h3>
            <p class="mb-0">Here is your today's overview</p>
        </div>

        <!-- STATS -->
       <div class="row stats mb-4">

    <div class="col-md-4 mb-3">
        <a href="{{ route('employee.pendingTasks') }}" class="text-decoration-none">
            <div class="stat-item bg-primary text-white">
                <h4>Pending Task</h4>
                <h2>{{ $tasks->where('status','pending')->count() }}</h2>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-3">
        <a href="{{ route('employee.tasks') }}" class="text-decoration-none">
            <div class="stat-item bg-warning text-dark">
                <h4>Total Task</h4>
                <h2>{{ $tasks->count() }}</h2>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-3">
        <a href="{{ route('employee.completedTasks') }}" class="text-decoration-none">
            <div class="stat-item bg-success text-white">
                <h4>Completed Task</h4>
                <h2>{{ $tasks->where('status','completed')->count() }}</h2>
            </div>
        </a>
    </div>

</div>

<!-- CARDS SECTION -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-person-circle me-2"></i> My Profile</h5>
                    <p class="text-muted">View your basic info</p>
                    <a href="{{ route('employee.profile') }}" class="btn btn-outline-primary w-100">Open Profile</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-list-check me-2"></i> My Tasks</h5>
                    <p class="text-muted">View tasks by date</p>
                    <a href="{{ route('employee.tasks') }}" class="btn btn-outline-success w-100">View Tasks</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-calendar-check me-2"></i> Daily Work Report</h5>
                    <p class="text-muted">Submit Today’s work</p>
                    <a href="{{ route('employee.daily_work.store') }}" class="btn btn-outline-warning w-100">Submit Work</a>
                </div>
            </div>
        </div>

        <!-- MORE CARDS -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-pin-angle me-2"></i> Today’s Assigned Task</h5>
                    <p class="text-muted">Tasks assigned today</p>
                    <a href="{{ route('employee.todayTasks') }}" class="btn btn-outline-info w-100">View Today</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-hourglass-split me-2"></i> Pending Tasks</h5>
                    <p class="text-muted">Tasks not completed</p>
                    <a href="{{ route('employee.pendingTasks') }}" class="btn btn-outline-danger w-100">Pending</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 dashboard-card">
                    <h5 class="fw-bold mb-1"><i class="bi bi-check2-circle me-2"></i> Completed Tasks</h5>
                    <p class="text-muted">Reviewed by admin</p>
                    <a href="{{ route('employee.completedTasks') }}" class="btn btn-outline-success w-100">Completed</a>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
/* FINAL FIXED CSS */

.sidebar {
    width: 240px;
    background: #1e1e2d;
    height: 100vh;
    color: white;
    padding: 20px;
    position: fixed;
    left: 0;
    top: 0;
}

.main-content {
    margin-left: 260px;
    padding: 25px;
    width: calc(100% - 260px);
}

.sidebar .item {
    padding: 12px 18px;
    display: block;
    border-radius: 8px;
    margin-bottom: 10px;
    color: #d7d7e0;
}
.sidebar .item:hover {
    background: #34344a;
    color: #fff;
}

.dashboard-header {
    padding: 20px;
    border-radius: 12px;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: white;
}

.stat-item {
    padding: 20px;
    border-radius: 12px;
    text-align: center;
}

.dashboard-card {
    border-radius: 12px;
    border-left: 5px solid #4e73df;
    transition: 0.3s;
}
.dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.15);
}
</style>

</body>
</html>
