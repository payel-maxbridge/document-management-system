<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Trail - Document Management System</title>
    
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

        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            outline: none;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #dee2e6;
        }

        .timeline-item {
            margin-bottom: 30px;
            padding-left: 80px;
            position: relative;
        }

        .timeline-dot {
            position: absolute;
            left: 12px;
            top: 5px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            border: 3px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            font-size: 16px;
        }

        .timeline-dot.success {
            border-color: #28a745;
            color: #28a745;
        }

        .timeline-dot.warning {
            border-color: #ffc107;
            color: #ffc107;
        }

        .timeline-dot.danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .timeline-dot.info {
            border-color: #0dcaf0;
            color: #0dcaf0;
        }

        .timeline-content {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 10px;
        }

        .timeline-title {
            font-weight: 600;
            color: #212529;
            font-size: 15px;
        }

        .timeline-time {
            color: #6c757d;
            font-size: 12px;
        }

        .timeline-user {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .timeline-description {
            color: #495057;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .timeline-details {
            background: #f8f9fa;
            border-left: 3px solid #0d6efd;
            padding: 10px 12px;
            border-radius: 4px;
            font-size: 12px;
            color: #495057;
        }

        .timeline-action {
            margin-top: 10px;
        }

        .timeline-action a {
            color: #0d6efd;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }

        .timeline-action a:hover {
            text-decoration: underline;
        }

        /* Activity Badge */
        .activity-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-right: 5px;
        }

        .badge-created {
            background-color: #e7f3ff;
            color: #0d6efd;
        }

        .badge-uploaded {
            background-color: #e7f3ff;
            color: #0d6efd;
        }

        .badge-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge-commented {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-downloaded {
            background-color: #d1ecf1;
            color: #0c5460;
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

            .filter-section {
                grid-template-columns: 1fr;
            }

            .timeline-item {
                padding-left: 60px;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-dot {
                left: 2px;
                width: 36px;
                height: 36px;
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

            .timeline-header {
                flex-direction: column;
            }

            .timeline-time {
                margin-top: 5px;
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
            <li><a href="audit-trail.html" class="active"><i class="bi bi-clock-history"></i> Audit Trail</a></li>
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
            <li><a href="audit-trail" class="active"><i class="bi bi-clock-history"></i> Audit Trail</a></li>
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
            <h1><i class="bi bi-clock-history"></i> Audit Trail</h1>
            <p>Track all document activities, approvals, and user actions.</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="form-group">
                <label for="filterDocument" class="form-label">Document Name</label>
                <input type="text" class="form-control" id="filterDocument" placeholder="Search document...">
            </div>
            <div class="form-group">
                <label for="filterAction" class="form-label">Action Type</label>
                <select class="form-control" id="filterAction">
                    <option value="">All Actions</option>
                    <option value="created">Created</option>
                    <option value="uploaded">Uploaded</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="commented">Commented</option>
                    <option value="downloaded">Downloaded</option>
                    <option value="versioned">Versioned</option>
                </select>
            </div>
            <div class="form-group">
                <label for="filterUser" class="form-label">User</label>
                <input type="text" class="form-control" id="filterUser" placeholder="Filter by user...">
            </div>
            <div class="form-group">
                <label for="filterDate" class="form-label">Date Range</label>
                <input type="date" class="form-control" id="filterDate">
            </div>
            <div class="form-group">
                <label>&nbsp;</label>
                <button class="btn-primary" onclick="applyFilters()"><i class="bi bi-search"></i> Apply Filters</button>
            </div>
        </div>

        <!-- Timeline -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-clock-history"></i> Activity Timeline</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <!-- Activity 1 -->
                    <div class="timeline-item">
                        <div class="timeline-dot success"><i class="bi bi-check-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-approved">APPROVED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> John Doe (Department Head)</div>
                                </div>
                                <div class="timeline-time">2024-11-28 10:30 AM</div>
                            </div>
                            <div class="timeline-description">
                                Document approved with comment: "Final approval given. Document is ready for implementation."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Status:</strong> Approved | <strong>Flow:</strong> Financial Review Flow
                            </div>
                        </div>
                    </div>

                    <!-- Activity 2 -->
                    <div class="timeline-item">
                        <div class="timeline-dot warning"><i class="bi bi-chat-dots"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-commented">COMMENTED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-27 2:15 PM</div>
                            </div>
                            <div class="timeline-description">
                                Added comment: "Reviewed and approved. The budget looks good. Minor adjustments made to the IT department allocation."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Comment Type:</strong> Approval Comment
                            </div>
                        </div>
                    </div>

                    <!-- Activity 3 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v2.1</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-26 9:45 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.5 MB. Changes: Updated Q4 projections and IT budget allocation.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Previous Version:</strong> v2.0 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 4 -->
                    <div class="timeline-item">
                        <div class="timeline-dot success"><i class="bi bi-check-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-approved">APPROVED</span> Budget 2025 - v2.0</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-15 3:20 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document approved at Finance Manager level. Forwarded to Department Head for final approval.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.0 | <strong>Status:</strong> Approved | <strong>Next Step:</strong> Final Approval
                            </div>
                        </div>
                    </div>

                    <!-- Activity 5 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v2.0</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-15 10:00 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.3 MB. Changes: Revised budget figures based on latest financial data.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.0 | <strong>Previous Version:</strong> v1.5 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 6 -->
                    <div class="timeline-item">
                        <div class="timeline-dot danger"><i class="bi bi-x-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-rejected">REJECTED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 4:30 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document rejected with comment: "Budget figures need revision. Please update the allocation for IT department and resubmit."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Status:</strong> Rejected | <strong>Reason:</strong> Requires Revision
                            </div>
                        </div>
                    </div>

                    <!-- Activity 7 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-download"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-downloaded">DOWNLOADED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 2:15 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document downloaded for review. File size: 2.1 MB.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Download Method:</strong> Direct Download
                            </div>
                        </div>
                    </div>

                    <!-- Activity 8 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 10:30 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.1 MB. Changes: Added detailed breakdown of departmental budgets.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Previous Version:</strong> v1.0 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 9 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-file-earmark-plus"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-created">CREATED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-10-15 9:00 AM</div>
                            </div>
                            <div class="timeline-description">
                                Document created and uploaded. Initial version: v1.0. File size: 1.8 MB. Category: Financial Documents.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.0 | <strong>Status:</strong> Submitted | <strong>File Type:</strong> PDF | <strong>Category:</strong> Financial
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function applyFilters() {
            const document = document.getElementById('filterDocument').value;
            const action = document.getElementById('filterAction').value;
            const user = document.getElementById('filterUser').value;
            const date = document.getElementById('filterDate').value;

            alert('Filters applied! (This is a prototype)\n\nDocument: ' + (document || 'All') + '\nAction: ' + (action || 'All') + '\nUser: ' + (user || 'All') + '\nDate: ' + (date || 'All'));
        }
    </script>
</body>
</html>
