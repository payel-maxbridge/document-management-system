<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents - Document Management System</title>
    
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

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
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
            padding: 8px 16px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 12px;
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
            font-size: 12px;
        }

        .btn-outline:hover {
            background-color: #0d6efd;
            color: white;
        }

        /* Table */
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
            <li><a href="documents.html" class="active"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload.html"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals.html"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy.html"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration.html"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions.html"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration.html"><i class="bi bi-sliders"></i> Configuration</a></li>
            <li><a href="index.html" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul> -->
        <ul class="sidebar-menu">
            <li><a href="dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="documents" class="active"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration"  class="active"><i class="bi bi-sliders"></i> Configuration</a></li>
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
            <h1><i class="bi bi-file-earmark"></i> Documents</h1>
            <p>Browse and manage all documents in the system.</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <h6 style="margin-bottom: 15px; font-weight: 600;"><i class="bi bi-funnel"></i> Filters</h6>
            <div class="filter-group">
                <div class="filter-item">
                    <label for="search-title">Search by Title</label>
                    <input type="text" id="search-title" placeholder="Enter document title...">
                </div>
                <div class="filter-item">
                    <label for="filter-tags">Filter by Tags</label>
                    <select id="filter-tags">
                        <option value="">All Tags</option>
                        <option value="financial">Financial</option>
                        <option value="project">Project</option>
                        <option value="hr">HR</option>
                        <option value="compliance">Compliance</option>
                        <option value="budget">Budget</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label for="filter-date">Filter by Date</label>
                    <input type="date" id="filter-date">
                </div>
                <div class="filter-item">
                    <label for="filter-status">Filter by Status</label>
                    <select id="filter-status">
                        <option value="">All Status</option>
                        <option value="approved">Approved</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-item">
                    <button class="btn-primary" style="width: 100%;"><i class="bi bi-search"></i> Search</button>
                </div>
            </div>
        </div>

        <!-- Documents List -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="margin: 0;"><i class="bi bi-list"></i> All Documents (24)</h5>
                    <a href="upload.html" class="btn-primary"><i class="bi bi-cloud-upload"></i> Upload New</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Document 1 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> Q4 Financial Report 2024</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: John Doe | 
                                <i class="bi bi-calendar"></i> Dec 1, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (2.5 MB)
                            </div>
                            <div class="document-meta">Description: Quarterly financial performance analysis and projections</div>
                            <div class="document-tags">
                                <span class="tag">Financial</span>
                                <span class="tag">Q4</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="document-card pending-approval">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-word"></i> Project Proposal - Website Redesign</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Sarah Smith | 
                                <i class="bi bi-calendar"></i> Nov 29, 2024 | 
                                <i class="bi bi-file-type-word"></i> DOCX (1.8 MB)
                            </div>
                            <div class="document-meta">Description: Comprehensive website redesign proposal with mockups and timeline</div>
                            <div class="document-tags">
                                <span class="tag">Project</span>
                                <span class="tag">Design</span>
                                <span class="tag">Web</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 3 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> Annual Compliance Audit Report</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Mike Johnson | 
                                <i class="bi bi-calendar"></i> Nov 26, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (3.2 MB)
                            </div>
                            <div class="document-meta">Description: Complete compliance audit findings and recommendations</div>
                            <div class="document-tags">
                                <span class="tag">Compliance</span>
                                <span class="tag">Audit</span>
                                <span class="tag">Annual</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 4 -->
                <div class="document-card rejected">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-excel"></i> Budget Allocation 2025 - Draft</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Alex Kumar | 
                                <i class="bi bi-calendar"></i> Nov 24, 2024 | 
                                <i class="bi bi-file-type-excel"></i> XLSX (0.8 MB)
                            </div>
                            <div class="document-meta">Description: Initial budget allocation proposal (rejected - requires revision)</div>
                            <div class="document-tags">
                                <span class="tag">Budget</span>
                                <span class="tag">2025</span>
                                <span class="tag">Finance</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-rejected"><i class="bi bi-x-circle"></i> Rejected</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 5 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-word"></i> HR Policy Update - Remote Work</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Emma Wilson | 
                                <i class="bi bi-calendar"></i> Nov 22, 2024 | 
                                <i class="bi bi-file-type-word"></i> DOCX (1.2 MB)
                            </div>
                            <div class="document-meta">Description: Updated remote work policy guidelines and procedures</div>
                            <div class="document-tags">
                                <span class="tag">HR</span>
                                <span class="tag">Policy</span>
                                <span class="tag">Remote Work</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 6 -->
                <div class="document-card pending-approval">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> IT Infrastructure Upgrade Plan</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: David Brown | 
                                <i class="bi bi-calendar"></i> Nov 20, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (2.1 MB)
                            </div>
                            <div class="document-meta">Description: Comprehensive IT infrastructure upgrade roadmap and budget</div>
                            <div class="document-tags">
                                <span class="tag">IT</span>
                                <span class="tag">Infrastructure</span>
                                <span class="tag">Upgrade</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div style="display: flex; justify-content: center; margin-top: 30px; gap: 10px;">
            <button class="btn-secondary" style="padding: 8px 12px; font-size: 12px;"><i class="bi bi-chevron-left"></i> Previous</button>
            <button class="btn-primary" style="padding: 8px 12px; font-size: 12px;">1</button>
            <button class="btn-secondary" style="padding: 8px 12px; font-size: 12px;">2</button>
            <button class="btn-secondary" style="padding: 8px 12px; font-size: 12px;">3</button>
            <button class="btn-secondary" style="padding: 8px 12px; font-size: 12px;"><i class="bi bi-chevron-right"></i> Next</button>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
