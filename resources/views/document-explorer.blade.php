<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Explorer - Document Management System</title>
    
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
            overflow-y: auto;
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
            margin-bottom: 20px;
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

        /* Breadcrumb */
        .breadcrumb-bar {
            background: white;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb-bar a {
            color: #0d6efd;
            text-decoration: none;
            font-size: 14px;
        }

        .breadcrumb-bar a:hover {
            text-decoration: underline;
        }

        /* Explorer Container */
        .explorer-container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 20px;
        }

        /* Folder Tree */
        .folder-tree {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 15px;
            height: fit-content;
        }

        .folder-tree h6 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #212529;
        }

        .folder-list {
            list-style: none;
            padding: 0;
        }

        .folder-item {
            padding: 8px 12px;
            margin-bottom: 5px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #495057;
        }

        .folder-item:hover {
            background-color: #f0f0f0;
            color: #0d6efd;
        }

        .folder-item.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 600;
        }

        .folder-item i {
            width: 20px;
            text-align: center;
        }

        /* File View */
        .file-view {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 20px;
        }

        .view-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .view-buttons {
            display: flex;
            gap: 10px;
        }

        .view-btn {
            background: #f0f0f0;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            color: #6c757d;
        }

        .view-btn:hover,
        .view-btn.active {
            background: #0d6efd;
            color: white;
        }

        /* Document Grid */
        .document-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .document-item {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .document-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .document-icon {
            font-size: 48px;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        .document-name {
            font-size: 12px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
            word-break: break-word;
        }

        .document-meta {
            font-size: 11px;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .document-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
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

        /* Document List View */
        .document-list {
            display: none;
        }

        .document-list.active {
            display: block;
        }

        .document-row {
            display: grid;
            grid-template-columns: 40px 2fr 1fr 1fr 1fr 100px;
            gap: 15px;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .document-row:hover {
            background-color: #f8f9fa;
        }

        .document-row:last-child {
            border-bottom: none;
        }

        .doc-checkbox {
            width: 20px;
            height: 20px;
        }

        .doc-name-cell {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            color: #0d6efd;
            cursor: pointer;
        }

        .doc-name-cell:hover {
            text-decoration: underline;
        }

        .doc-icon {
            font-size: 20px;
        }

        .doc-modified {
            font-size: 13px;
            color: #6c757d;
        }

        .doc-size {
            font-size: 13px;
            color: #6c757d;
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

        .btn-small {
            background-color: #0d6efd;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .btn-small:hover {
            background-color: #0b5ed7;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .explorer-container {
                grid-template-columns: 1fr;
            }

            .folder-tree {
                display: none;
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

            .document-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }

            .document-row {
                grid-template-columns: 40px 1fr 1fr;
                gap: 10px;
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

            .document-grid {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }

            .document-row {
                grid-template-columns: 1fr;
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
            <li><a href="document-explorer.html" class="active"><i class="bi bi-folder"></i> Document Explorer</a></li>
            <li><a href="documents.html"><i class="bi bi-file-earmark"></i> Documents</a></li>
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
            <li><a href="documents"><i class="bi bi-file-earmark"></i> Documents</a></li>
            <li><a href="upload"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration"><i class="bi bi-sliders"></i> Configuration</a></li>
            <li><a href="document-explorer" class="active"><i class="bi bi-folder"></i> Document Explorer</a></li>
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
            <h1><i class="bi bi-folder"></i> Document Explorer</h1>
            <p>Browse documents organized by category folders.</p>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <a href="#"><i class="bi bi-house"></i> Home</a>
            <span>/</span>
            <a href="#" id="currentFolder">Financial Documents</a>
        </div>

        <!-- Explorer Container -->
        <div class="explorer-container">
            <!-- Folder Tree -->
            <div class="folder-tree">
                <h6><i class="bi bi-folder-fill"></i> Categories</h6>
                <ul class="folder-list">
                    <li class="folder-item active" onclick="selectFolder(this, 'Financial')">
                        <i class="bi bi-folder-fill"></i> Financial
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'HR')">
                        <i class="bi bi-folder-fill"></i> HR & Payroll
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Projects')">
                        <i class="bi bi-folder-fill"></i> Projects
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Compliance')">
                        <i class="bi bi-folder-fill"></i> Compliance
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Policies')">
                        <i class="bi bi-folder-fill"></i> Policies
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Contracts')">
                        <i class="bi bi-folder-fill"></i> Contracts
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Reports')">
                        <i class="bi bi-folder-fill"></i> Reports
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Archived')">
                        <i class="bi bi-folder-fill"></i> Archived
                    </li>
                </ul>
            </div>

            <!-- File View -->
            <div class="file-view">
                <!-- View Controls -->
                <div class="view-controls">
                    <div>
                        <h6 style="margin: 0; color: #212529; font-weight: 600;">Financial Documents (12 items)</h6>
                    </div>
                    <div class="view-buttons">
                        <button class="view-btn active" onclick="switchView('grid', this)"><i class="bi bi-grid-3x3-gap"></i> Grid</button>
                        <button class="view-btn" onclick="switchView('list', this)"><i class="bi bi-list-ul"></i> List</button>
                    </div>
                </div>

                <!-- Grid View -->
                <div class="document-grid" id="gridView">
                    <div class="document-item" onclick="openDocument('Budget 2025')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Budget 2025</div>
                        <div class="document-meta">v2.1 • 2.5 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Q4 Financial Report')">
                        <div class="document-icon"><i class="bi bi-file-earmark-excel"></i></div>
                        <div class="document-name">Q4 Financial Report</div>
                        <div class="document-meta">v1.0 • 1.8 MB</div>
                        <span class="document-status status-pending">Pending</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Expense Claims')">
                        <div class="document-icon"><i class="bi bi-file-earmark-word"></i></div>
                        <div class="document-name">Expense Claims</div>
                        <div class="document-meta">v3.0 • 0.9 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Invoice Template')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Invoice Template</div>
                        <div class="document-meta">v1.5 • 0.4 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Tax Compliance')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Tax Compliance</div>
                        <div class="document-meta">v2.0 • 1.2 MB</div>
                        <span class="document-status status-pending">Pending</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Audit Report')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Audit Report</div>
                        <div class="document-meta">v1.0 • 3.2 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>
                </div>

                <!-- List View -->
                <div class="document-list" id="listView">
                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Budget 2025')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Budget 2025</span>
                        </div>
                        <div class="doc-modified">2024-11-28</div>
                        <div class="doc-size">2.5 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Budget 2025')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Q4 Financial Report')">
                            <i class="bi bi-file-earmark-excel doc-icon"></i>
                            <span>Q4 Financial Report</span>
                        </div>
                        <div class="doc-modified">2024-11-25</div>
                        <div class="doc-size">1.8 MB</div>
                        <div><span class="document-status status-pending">Pending</span></div>
                        <button class="btn-small" onclick="openDocument('Q4 Financial Report')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Expense Claims')">
                            <i class="bi bi-file-earmark-word doc-icon"></i>
                            <span>Expense Claims</span>
                        </div>
                        <div class="doc-modified">2024-11-20</div>
                        <div class="doc-size">0.9 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Expense Claims')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Invoice Template')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Invoice Template</span>
                        </div>
                        <div class="doc-modified">2024-11-15</div>
                        <div class="doc-size">0.4 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Invoice Template')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Tax Compliance')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Tax Compliance</span>
                        </div>
                        <div class="doc-modified">2024-11-10</div>
                        <div class="doc-size">1.2 MB</div>
                        <div><span class="document-status status-pending">Pending</span></div>
                        <button class="btn-small" onclick="openDocument('Tax Compliance')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Audit Report')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Audit Report</span>
                        </div>
                        <div class="doc-modified">2024-11-05</div>
                        <div class="doc-size">3.2 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Audit Report')">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectFolder(element, folderName) {
            document.querySelectorAll('.folder-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');
            document.getElementById('currentFolder').textContent = folderName + ' Documents';
        }

        function switchView(viewType, button) {
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');

            const gridView = document.getElementById('gridView');
            const listView = document.getElementById('listView');

            if (viewType === 'grid') {
                gridView.classList.remove('active');
                gridView.style.display = 'grid';
                listView.classList.remove('active');
                listView.style.display = 'none';
            } else {
                gridView.style.display = 'none';
                listView.classList.add('active');
                listView.style.display = 'block';
            }
        }

        function openDocument(docName) {
            window.location.href = 'document-view.html?doc=' + encodeURIComponent(docName);
        }
    </script>
</body>
</html>
