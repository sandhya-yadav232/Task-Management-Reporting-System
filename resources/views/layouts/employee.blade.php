<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMRS - Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
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
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3 class="logo">TMRS Employee</h3>

        <a href="{{ route('employee.dashboard') }}" class="item"><i class="bi bi-house"></i> Dashboard</a>
        <a href="{{ route('employee.profile') }}" class="item"><i class="bi bi-person-circle"></i> My Profile</a>
        <a href="{{ route('employee.tasks') }}" class="item"><i class="bi bi-list-task"></i> My Tasks</a>
        <a href="{{ route('employee.daily_work') }}" class="item"><i class="bi bi-journal-check"></i> Daily Work Report</a>
        <a href="{{ route('employee.todayTasks') }}" class="item"><i class="bi bi-calendar-day"></i> Today's Tasks</a>
        <a href="{{ route('employee.pendingTasks') }}" class="item"><i class="bi bi-hourglass-split"></i> Pending Tasks</a>
        <a href="{{ route('employee.completedTasks') }}" class="item"><i class="bi bi-check2-circle"></i> Completed Tasks</a>
  <!-- LOGOUT FORM PROPERLY CLOSED -->
        <form action="{{ route('employee.logout') }}" method="POST">
            @csrf
            <button class="logout btn w-100 text-start text-white border-0 bg-transparent">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>

</div>

</body>
</html>
