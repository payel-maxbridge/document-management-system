<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approvals - Document Management System</title>
    
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

        /* Cards */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
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

        /* Approval Item */
        .approval-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .approval-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .approval-item.urgent {
            border-left: 4px solid #dc3545;
            background-color: #fff5f5;
        }

        .approval-item.normal {
            border-left: 4px solid #ffc107;
            background-color: #fffbf0;
        }

        .approval-item.old {
            border-left: 4px solid #6c757d;
        }

        .approval-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }

        .approval-title {
            font-size: 16px;
            font-weight: 600;
            color: #212529;
        }

        .approval-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-urgent {
            background-color: #f8d7da;
            color: #721c24;
        }

        .approval-meta {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .approval-description {
            font-size: 14px;
            color: #495057;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .approval-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-approve {
            background-color: #28a745;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-approve:hover {
            background-color: #218838;
        }

        .btn-reject {
            background-color: #dc3545;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-reject:hover {
            background-color: #c82333;
        }

        .btn-view {
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background-color: #0b5ed7;
        }

        /* Tabs */
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #0d6efd;
            border-bottom-color: #0d6efd;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom-color: #0d6efd;
            background-color: transparent;
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

            .approval-header {
                flex-direction: column;
            }

            .approval-actions {
                flex-direction: column;
            }

            .approval-actions button {
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
            <li><a href="documents.html"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload.html"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals.html" class="active"><i class="bi bi-check-circle"></i> Approvals</a></li>
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
            <li><a href="approvals" class="active"><i class="bi bi-check-circle"></i> Approvals</a></li>
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
            <h1><i class="bi bi-check-circle"></i> Approvals</h1>
            <p>Review and approve pending documents.</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
                    <i class="bi bi-hourglass-split"></i> Pending (5)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">
                    <i class="bi bi-check-circle"></i> Approved (12)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">
                    <i class="bi bi-x-circle"></i> Rejected (2)
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Pending Approvals -->
            <div class="tab-pane fade show active" id="pending" role="tabpanel">
                <!-- Urgent Item -->
                <div class="approval-item urgent">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-exclamation-circle"></i> IT Infrastructure Upgrade Plan</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: David Brown | 
                                <i class="bi bi-calendar"></i> 8 days ago
                            </div>
                        </div>
                        <span class="approval-status status-urgent"><i class="bi bi-exclamation-triangle"></i> URGENT (8 days)</span>
                    </div>
                    <div class="approval-description">
                        Comprehensive IT infrastructure upgrade roadmap including server upgrades, network improvements, and security enhancements. Budget: $150,000.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <!-- Normal Items -->
                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Budget Allocation 2025</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Sarah Smith | 
                                <i class="bi bi-calendar"></i> 1 day ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (1 day)</span>
                    </div>
                    <div class="approval-description">
                        Proposed budget allocation for fiscal year 2025 across all departments. Total budget: $2,500,000.
                    </div>
                    <div style="margin-top: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                        <label style="font-weight: 600; color: #212529; margin-bottom: 10px; display: block;">Add Comments (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Add your comments or notes before approving/rejecting..." style="border: 1px solid #dee2e6; border-radius: 6px; padding: 10px 15px; font-size: 14px; margin-bottom: 10px;"></textarea>
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve" onclick="approveWithComment()"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject" onclick="rejectWithComment()"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">HR Policy Update - Remote Work</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Mike Johnson | 
                                <i class="bi bi-calendar"></i> 4 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (4 days)</span>
                    </div>
                    <div class="approval-description">
                        Updated remote work policy guidelines including work-from-home eligibility, approval process, and equipment provisions.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Project Proposal - Website Redesign</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Alex Kumar | 
                                <i class="bi bi-calendar"></i> 2 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (2 days)</span>
                    </div>
                    <div class="approval-description">
                        Comprehensive website redesign proposal with mockups, timeline, and resource requirements. Estimated duration: 6 months.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Vendor Contract - ABC Supplies</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Emma Wilson | 
                                <i class="bi bi-calendar"></i> 3 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (3 days)</span>
                    </div>
                    <div class="approval-description">
                        Annual vendor contract with ABC Supplies for office equipment and supplies. Contract value: $50,000.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>
            </div>

            <!-- Approved Documents -->
            <div class="tab-pane fade" id="approved" role="tabpanel">
                <div style="padding: 20px; background: white; border-radius: 8px; text-align: center;">
                    <i class="bi bi-check-circle" style="font-size: 48px; color: #28a745; margin-bottom: 15px; display: block;"></i>
                    <h5>12 Documents Approved</h5>
                    <p style="color: #6c757d; margin-bottom: 0;">All approved documents are displayed here with approval dates and approver information.</p>
                </div>
            </div>

            <!-- Rejected Documents -->
            <div class="tab-pane fade" id="rejected" role="tabpanel">
                <div class="approval-item" style="border-left: 4px solid #dc3545; background-color: #fff5f5;">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-x-circle"></i> Budget Allocation 2025 - Draft</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> Rejected by: John Doe | 
                                <i class="bi bi-calendar"></i> 5 days ago
                            </div>
                        </div>
                        <span class="approval-status" style="background-color: #f8d7da; color: #721c24;"><i class="bi bi-x-circle"></i> Rejected</span>
                    </div>
                    <div class="approval-description">
                        <strong>Rejection Reason:</strong> Budget figures need revision. Please update the allocation for IT department and resubmit.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-view" style="background-color: #6c757d;"><i class="bi bi-arrow-repeat"></i> Resubmit</button>
                    </div>
                </div>

                <div class="approval-item" style="border-left: 4px solid #dc3545; background-color: #fff5f5;">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-x-circle"></i> Training Program Proposal - v1</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> Rejected by: Sarah Smith | 
                                <i class="bi bi-calendar"></i> 10 days ago
                            </div>
                        </div>
                        <span class="approval-status" style="background-color: #f8d7da; color: #721c24;"><i class="bi bi-x-circle"></i> Rejected</span>
                    </div>
                    <div class="approval-description">
                        <strong>Rejection Reason:</strong> Training schedule conflicts with Q1 project timeline. Please reschedule and resubmit.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-view" style="background-color: #6c757d;"><i class="bi bi-arrow-repeat"></i> Resubmit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add event listeners to approve/reject buttons
        document.querySelectorAll('.btn-approve').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Document approved successfully! (This is a prototype)');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Please provide a rejection reason. (This is a prototype)');
            });
        });

        function approveWithComment() {
            alert('Document approved with comments! (This is a prototype)');
        }

        function rejectWithComment() {
            alert('Document rejected with comments! (This is a prototype)');
        }
    </script>
</body>
</html>
