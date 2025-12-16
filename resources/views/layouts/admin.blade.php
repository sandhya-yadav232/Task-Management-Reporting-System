<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMRS Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 250px;
            height: 100vh;
            background: #111827;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
        }

        .admin-sidebar .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .admin-sidebar a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 10px;
            color: #d1d5db;
            background: #1f2937;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .admin-sidebar a:hover {
            background: #374151;
            color: #fff;
        }

        .admin-main {
            margin-left: 270px;
            padding: 25px;
        }

        .page-header {
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

    <div class="admin-sidebar">
        <div class="logo">TMRS Admin</div>

        <a href="/admin/dashboard"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
        <a href="/admin/employee"><i class="bi bi-people me-2"></i> Employees</a>
        <a href="/admin/tasks_assign"><i class="bi bi-clipboard-plus me-2"></i> Assign Task</a>
        <a href="/admin/tasks_overview"><i class="bi bi-card-checklist me-2"></i>Assigned Tasks List</a>
        <a href="/admin/daily_work_report"><i class="bi bi-journal-text me-2"></i> Daily Work Reports</a>
       <!-- <a href="/admin/settings"><i class="bi bi-gear me-2"></i> Settings</a>-->

 <a href="{{ route('admin.logout') }}" class="text-danger mt-4">
         <i class="bi bi-box-arrow-right"></i> Logout
                                            </a>    </div>

    <div class="admin-main">
        @yield('content')
    </div>

</body>
</html>
