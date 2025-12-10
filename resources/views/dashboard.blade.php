<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Document Management System</title>
    
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

        /* Dashboard Stats */
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
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
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 12px;
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

        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
            <p>Welcome back! Here's your document management overview.</p>
        </div>

        <!-- Statistics Row -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="stat-label">Total Documents</div>
                    <div class="stat-number">24</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div class="stat-label">Pending Approvals</div>
                    <div class="stat-number">5</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                    <div class="stat-label">Approved</div>
                    <div class="stat-number">18</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
                    <div class="stat-label">Rejected</div>
                    <div class="stat-number">1</div>
                </div>
            </div>
        </div>

        <!-- Recently Uploaded Documents -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-cloud-upload"></i> Recently Uploaded Documents</h5>
            </div>
            <div class="card-body">
                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Q4 Financial Report 2024</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> Today at 10:30 AM
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-pdf"></i> PDF | 2.5 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Financial</span>
                                <span class="tag">Q4</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-recent"><i class="bi bi-check-circle"></i> New</span>
                        </div>
                    </div>
                </div>

                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Project Proposal - Website Redesign</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> 2 days ago
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-word"></i> DOCX | 1.8 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Project</span>
                                <span class="tag">Design</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </div>
                    </div>
                </div>

                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Annual Compliance Audit Report</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> 5 days ago
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-pdf"></i> PDF | 3.2 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Compliance</span>
                                <span class="tag">Audit</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Approvals at Your Level -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-check-circle"></i> Pending Approvals at Your Level</h5>
                    </div>
                    <div class="card-body">
                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Budget Allocation 2025</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Sarah Smith | 
                                        <i class="bi bi-calendar"></i> 1 day ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Budget</span>
                                        <span class="tag">2025</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 1 day</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>

                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">HR Policy Update - Remote Work</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Mike Johnson | 
                                        <i class="bi bi-calendar"></i> 4 days ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">HR</span>
                                        <span class="tag">Policy</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 4 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>

                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">IT Infrastructure Upgrade Plan</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Alex Kumar | 
                                        <i class="bi bi-calendar"></i> 8 days ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">IT</span>
                                        <span class="tag">Infrastructure</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-red"><i class="bi bi-exclamation-circle"></i> 8 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Pending at Lower Levels -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Documents Pending at Lower Levels (>3 days)</h5>
                    </div>
                    <div class="card-body">
                        <div class="document-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Vendor Contract - ABC Supplies</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> Pending with: Procurement Team | 
                                        <i class="bi bi-calendar"></i> 5 days
                                    </div>
                                    <div class="document-meta">
                                        <i class="bi bi-diagram-3"></i> Status: Awaiting Procurement Review
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Vendor</span>
                                        <span class="tag">Contract</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 5 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <button class="btn-secondary" style="font-size: 12px; padding: 8px 16px;"><i class="bi bi-bell"></i> Send Reminder</button>
                            </div>
                        </div>

                        <div class="document-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Training Program Proposal</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> Pending with: HR Department | 
                                        <i class="bi bi-calendar"></i> 4 days
                                    </div>
                                    <div class="document-meta">
                                        <i class="bi bi-diagram-3"></i> Status: Under Review
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Training</span>
                                        <span class="tag">HR</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 4 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <button class="btn-secondary" style="font-size: 12px; padding: 8px 16px;"><i class="bi bi-bell"></i> Send Reminder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
