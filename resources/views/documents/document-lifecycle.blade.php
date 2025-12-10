<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Lifecycle - Document Management System</title>
    
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

        /* Card */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 8px 8px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 30px 20px;
        }

        /* Workflow Steps */
        .workflow-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 40px;
        }

        .workflow-container::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            right: 0;
            height: 2px;
            background: #dee2e6;
            z-index: 0;
        }

        .workflow-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .step-circle {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: white;
            border: 3px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .workflow-step.active .step-circle {
            background: #0d6efd;
            border-color: #0d6efd;
            color: white;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .workflow-step.completed .step-circle {
            background: #28a745;
            border-color: #28a745;
            color: white;
        }

        .step-label {
            font-weight: 600;
            color: #212529;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .step-status {
            font-size: 12px;
            color: #6c757d;
        }

        .workflow-step.active .step-status {
            color: #0d6efd;
            font-weight: 600;
        }

        .workflow-step.completed .step-status {
            color: #28a745;
            font-weight: 600;
        }

        /* Document Details */
        .document-details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .detail-item {
            padding: 15px;
            background: white;
            border-radius: 6px;
            border-left: 3px solid #0d6efd;
        }

        .detail-label {
            font-size: 12px;
            color: #6c757d;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 16px;
            color: #212529;
            font-weight: 600;
        }

        /* Approval History */
        .approval-history {
            margin-top: 30px;
        }

        .approval-history h6 {
            font-weight: 600;
            color: #212529;
            margin-bottom: 20px;
        }

        .approval-record {
            padding: 15px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 15px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 15px;
            align-items: start;
        }

        .approval-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .approval-icon.approved {
            background: #28a745;
        }

        .approval-icon.rejected {
            background: #dc3545;
        }

        .approval-icon.pending {
            background: #ffc107;
        }

        .approval-content {
            flex: 1;
        }

        .approval-user {
            font-weight: 600;
            color: #212529;
            margin-bottom: 5px;
        }

        .approval-role {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .approval-comment {
            font-size: 13px;
            color: #495057;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin-top: 8px;
        }

        .approval-time {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .detail-row {
                grid-template-columns: 1fr 1fr;
            }
        }

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

            .workflow-container {
                flex-wrap: wrap;
            }

            .workflow-step {
                flex: 0 0 calc(50% - 10px);
                margin-bottom: 30px;
            }

            .workflow-container::before {
                display: none;
            }

            .detail-row {
                grid-template-columns: 1fr;
            }

            .approval-record {
                grid-template-columns: auto 1fr;
            }

            .approval-time {
                grid-column: 2;
                text-align: left;
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

            .workflow-step {
                flex: 0 0 100%;
            }

            .step-circle {
                width: 60px;
                height: 60px;
                font-size: 24px;
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
        <!-- <ul class="sidebar-menu">
            <li><a href="dashboard.html"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="document-explorer.html"><i class="bi bi-folder"></i> Document Explorer</a></li>
            <li><a href="documents.html"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload.html"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals.html"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="document-lifecycle.html" class="active"><i class="bi bi-diagram-2"></i> Document Lifecycle</a></li>
            <li><a href="audit-trail.html"><i class="bi bi-clock-history"></i> Audit Trail</a></li>
            <li><a href="user-hierarchy.html"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration.html"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions.html"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration.html"><i class="bi bi-sliders"></i> Configuration</a></li>
            <li><a href="index.html" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul> -->
        <ul class="sidebar-menu">
            <li><a href="dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="documents"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration"><i class="bi bi-sliders"></i> Configuration</a></li>
            <li><a href="document-explorer"><i class="bi bi-folder"></i> Document Explorer</a></li>
            <li><a href="audit-trail"><i class="bi bi-clock-history"></i> Audit Trail</a></li>
            <li><a href="document-lifecycle" class="active"><i class="bi bi-diagram-2"></i> Document Lifecycle</a></li>
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
            <h1><i class="bi bi-diagram-2"></i> Document Lifecycle</h1>
            <p>Track document status through the approval workflow.</p>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-file-earmark"></i> Budget 2025 - Workflow Status</h5>
            </div>
            <div class="card-body">
                <!-- Workflow Steps -->
                <div class="workflow-container">
                    <div class="workflow-step completed">
                        <div class="step-circle"><i class="bi bi-check"></i></div>
                        <div class="step-label">Submitted</div>
                        <div class="step-status">Completed</div>
                    </div>

                    <div class="workflow-step completed">
                        <div class="step-circle"><i class="bi bi-check"></i></div>
                        <div class="step-label">Finance Review</div>
                        <div class="step-status">Completed</div>
                    </div>

                    <div class="workflow-step active">
                        <div class="step-circle"><i class="bi bi-hourglass-split"></i></div>
                        <div class="step-label">Department Head</div>
                        <div class="step-status">In Progress</div>
                    </div>

                    <div class="workflow-step">
                        <div class="step-circle"><i class="bi bi-person-check"></i></div>
                        <div class="step-label">Executive Review</div>
                        <div class="step-status">Pending</div>
                    </div>

                    <div class="workflow-step">
                        <div class="step-circle"><i class="bi bi-check-circle"></i></div>
                        <div class="step-label">Final Approval</div>
                        <div class="step-status">Pending</div>
                    </div>
                </div>

                <!-- Document Details -->
                <div class="document-details">
                    <div class="detail-row">
                        <div class="detail-item">
                            <div class="detail-label">Document Name</div>
                            <div class="detail-value">Budget 2025</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Current Version</div>
                            <div class="detail-value">v2.1</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Current Status</div>
                            <div class="detail-value"><span class="status-badge status-pending">Pending Approval</span></div>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-item">
                            <div class="detail-label">Submitted By</div>
                            <div class="detail-value">Sarah Smith</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Submitted Date</div>
                            <div class="detail-value">2024-10-15</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Category</div>
                            <div class="detail-value">Financial</div>
                        </div>
                    </div>
                </div>

                <!-- Approval History -->
                <div class="approval-history">
                    <h6><i class="bi bi-check-circle"></i> Approval History</h6>

                    <div class="approval-record">
                        <div class="approval-icon approved"><i class="bi bi-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Sarah Smith</div>
                            <div class="approval-role">Finance Officer - Submitted Document</div>
                            <div class="approval-comment">
                                <strong>Action:</strong> Document submitted for approval<br>
                                <strong>Comment:</strong> "Proposed budget allocation for fiscal year 2025 across all departments. Total budget: $2,500,000."
                            </div>
                        </div>
                        <div class="approval-time">2024-10-15<br>9:00 AM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon approved"><i class="bi bi-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Mike Johnson</div>
                            <div class="approval-role">Finance Manager - Approved</div>
                            <div class="approval-comment">
                                <strong>Action:</strong> Document approved and forwarded<br>
                                <strong>Comment:</strong> "Reviewed and approved. The budget looks good. Minor adjustments made to the IT department allocation."
                            </div>
                        </div>
                        <div class="approval-time">2024-11-15<br>3:20 PM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon pending"><i class="bi bi-hourglass-split"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">John Doe</div>
                            <div class="approval-role">Department Head - Pending Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Since:</strong> 2024-11-28 (1 day)<br>
                                <strong>Note:</strong> Document is in review. Expected response by 2024-12-05.
                            </div>
                        </div>
                        <div class="approval-time">2024-11-28<br>10:30 AM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon"><i class="bi bi-person-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Executive Director</div>
                            <div class="approval-role">Executive - Pending Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Note:</strong> Document will be forwarded after Department Head approval.
                            </div>
                        </div>
                        <div class="approval-time">Pending</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon"><i class="bi bi-check-circle"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">CEO</div>
                            <div class="approval-role">CEO - Final Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Note:</strong> Document will be forwarded for final approval after all previous levels are approved.
                            </div>
                        </div>
                        <div class="approval-time">Pending</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
