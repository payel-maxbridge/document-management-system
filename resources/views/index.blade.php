<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System (DMS)</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #0dcaf0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --green-recent: #28a745;
            --amber-old: #ffc107;
            --red-very-old: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Sidebar Navigation */
        .sidebar {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar .logo {
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .sidebar .logo h5 {
            margin: 0;
            font-weight: 700;
            font-size: 18px;
        }

        .sidebar .logo p {
            margin: 5px 0 0 0;
            font-size: 12px;
            opacity: 0.8;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: white;
        }

        .sidebar-menu i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .top-bar {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .top-bar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Page Title */
        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 32px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #6c757d;
            margin: 0;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 8px 8px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-recent {
            background-color: #d4edda;
            color: #155724;
        }

        .status-amber {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-red {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Buttons */
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-outline {
            border: 2px solid #0d6efd;
            background-color: transparent;
            color: #0d6efd;
            border-radius: 6px;
            padding: 8px 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: #0d6efd;
            color: white;
        }

        /* Tables */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .table th {
            font-weight: 600;
            color: #212529;
            padding: 15px;
            border: none;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: #dee2e6;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 8px 8px 0 0;
        }

        .modal-title {
            font-weight: 700;
            color: #212529;
        }

        /* Dashboard Stats */
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #0d6efd;
            margin: 10px 0;
        }

        .stat-label {
            font-size: 14px;
            color: #6c757d;
            font-weight: 600;
        }

        .stat-icon {
            font-size: 32px;
            color: #0d6efd;
            margin-bottom: 10px;
        }

        /* Document Card */
        .document-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #0d6efd;
            transition: all 0.3s ease;
        }

        .document-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateX(4px);
        }

        .document-card.pending-approval {
            border-left-color: #ffc107;
        }

        .document-card.approved {
            border-left-color: #28a745;
        }

        .document-card.rejected {
            border-left-color: #dc3545;
        }

        .document-title {
            font-size: 16px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
        }

        .document-meta {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .document-tags {
            margin-top: 10px;
        }

        .tag {
            display: inline-block;
            background-color: #e7f3ff;
            color: #0d6efd;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .filter-item {
            flex: 1;
            min-width: 200px;
        }

        .filter-item label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #212529;
        }

        .filter-item input,
        .filter-item select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 15px;
            }

            .page-title h1 {
                font-size: 24px;
            }

            .top-bar {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .filter-group {
                flex-direction: column;
            }

            .filter-item {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 150px;
            }

            .main-content {
                margin-left: 150px;
                padding: 10px;
            }

            .page-title h1 {
                font-size: 20px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-number {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="logo">
            <h5><i class="bi bi-file-earmark-text"></i> DMS</h5>
            <p>Document Management</p>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="documents"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration"><i class="bi bi-sliders"></i> Configuration</a></li>
            <li><a href="document-explorer"><i class="bi bi-folder"></i> Document Explorer</a></li>
            <li><a href="audit-trail"><i class="bi bi-clock-history"></i> Audit Trail</a></li>
            <li><a href="document-lifecycle"><i class="bi bi-diagram-2"></i> Document Lifecycle</a></li>
            <li><a href="index" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h6 style="margin: 0; color: #212529; font-weight: 600;">Document Management System</h6>
            <div class="user-info">
                <div class="user-avatar">JD</div>
                <div>
                    <div style="font-weight: 600; color: #212529;">John Doe</div>
                    <div style="font-size: 12px; color: #6c757d;">Department Head</div>
                </div>
            </div>
        </div>

        <!-- Page Content (will be replaced by specific pages) -->
        <div id="page-content">
            <!-- Content loaded here -->
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set active menu item based on current page
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop() || 'index.html';
            const menuItems = document.querySelectorAll('.sidebar-menu a');
            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentPage) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
