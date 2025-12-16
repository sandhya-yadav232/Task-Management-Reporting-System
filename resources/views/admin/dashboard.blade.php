<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TMRS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #1e1e2d;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 15px;
            color: #fff;
        }

        .sidebar .logo {
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
        }

        .sidebar a {
            color: #c7c7d9;
            padding: 12px 18px;
            display: block;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #34344a;
            color: #fff;
        }

        /* Page Content */
        .main {
            margin-left: 260px;
            padding: 30px;
        }

        /* Top Navbar */
        .admin-top {
            background: #fff;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        /* Stats Cards */
        .stat-card {
            border-radius: 14px;
            padding: 25px;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 18px rgba(0,0,0,0.18);
        }

        .stat-icon {
            font-size: 38px;
            opacity: 0.7;
        }

        /* Activity */
        .activity-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        /* Profile Dropdown */
        .profile-menu {
            position: relative;
        }

        .profile-dropdown {
            position: absolute;
            right: 0;
            top: 45px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
            width: 150px;
            display: none;
        }

        .profile-dropdown a {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
        }

        .profile-dropdown a:hover {
            background: #f0f0f5;
        }

        footer {
            text-align: center;
            padding: 12px;
            margin-top: 40px;
            color: #777;
            font-size: 14px;
        }

    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3 class="logo">TMRS Admin</h3>

        <a href="/admin/dashboard" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="/admin/employee"><i class="bi bi-people"></i> Employees</a>
        <a href="/admin/tasks_assign"><i class="bi bi-clipboard-plus"></i> Assign Task</a>
        <a href="/admin/tasks_overview"><i class="bi bi-card-checklist"></i> Assigned Tasks List</a>
        <a href="/admin/daily_work_report"><i class="bi bi-journal-text"></i> Daily Work Reports</a>
        <!--<a href="/admin/settings"><i class="bi bi-gear"></i> Settings</a>-->

       <a href="{{ route('admin.logout') }}" class="text-danger mt-4">
         <i class="bi bi-box-arrow-right"></i> Logout
                                            </a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- Top Bar -->
        <div class="admin-top d-flex justify-content-between align-items-center">

            <h3 class="fw-bold mb-0">
                Welcome, {{ Auth::guard('admin')->user()->name }} 👋
            </h3>

            <div class="profile-menu">
                <i class="bi bi-person-circle fs-3" style="cursor:pointer;" id="profileIcon"></i>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="{{ route('admin.profile') }}">My Profile</a>
                           <a href="{{ route('admin.logout') }}" class="text-danger mt-4">
                                Logout</a>
                </div>
            </div>
        </div>

<!-- Stats Row -->
        <div class="row g-4">

            <!-- Total Employees -->
            <div class="col-md-4">
                <a href="/admin/employee" style="text-decoration:none;">
                    <div class="stat-card bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>{{ $totalEmployees }}</h2>
                                <p class="mb-0">Total Employees</p>
                            </div>
                            <i class="bi bi-people stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pending Tasks -->
            <div class="col-md-4">
                <a href="/admin/tasks_overview?filter=pending" style="text-decoration:none;">
                    <div class="stat-card bg-warning text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>{{ $pendingTasks }}</h2>
                                <p class="mb-0">Pending Tasks</p>
                            </div>
                            <i class="bi bi-hourglass-split stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Completed Tasks -->
            <div class="col-md-4">
                <a href="/admin/tasks_overview?filter=completed" style="text-decoration:none;">
                    <div class="stat-card bg-success text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>{{ $completedTasks }}</h2>
                                <p class="mb-0">Completed Tasks</p>
                            </div>
                            <i class="bi bi-check2-circle stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card shadow mt-4">
            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">

                @foreach($recentActivities as $activity)
                <div class="activity-item">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    <strong>{{ $activity->employee->name }}</strong>
                    {{ strtolower($activity->status) }} task
                    "<span class="text-primary">{{ $activity->project_name }}</span>"
                </div>
                @endforeach
            </div>
        </div>

        <footer>
           Task Management & Reporting System
        </footer>

    </div>

<script>
    // Profile Dropdown
    document.getElementById("profileIcon").addEventListener("click", function() {
        const menu = document.getElementById("profileDropdown");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    window.onclick = function(e) {
        if (!e.target.matches('#profileIcon')) {
            document.getElementById("profileDropdown").style.display = "none";
        }
    }
</script>

</body>
</html>
