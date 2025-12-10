<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document View - Document Management System</title>
    
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
            font-size: 28px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 5px;
        }

        /* Document Container */
        .document-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        /* Document Preview */
        .document-preview {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 20px;
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .preview-header h5 {
            margin: 0;
            color: #212529;
            font-weight: 600;
        }

        .preview-actions {
            display: flex;
            gap: 10px;
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

        .btn-small-secondary {
            background-color: #6c757d;
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

        .btn-small-secondary:hover {
            background-color: #5a6268;
        }

        .preview-content {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 30px;
            text-align: center;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .preview-icon {
            font-size: 64px;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .preview-text {
            color: #6c757d;
            margin-bottom: 15px;
        }

        /* Sidebar */
        .document-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 20px;
        }

        .sidebar-card h6 {
            font-weight: 600;
            color: #212529;
            margin-bottom: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 13px;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
        }

        .info-value {
            color: #212529;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        /* Tabs */
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 15px;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 10px 0;
            font-weight: 600;
            font-size: 13px;
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

        /* Version List */
        .version-item {
            padding: 12px 0;
            border-bottom: 1px solid #dee2e6;
            font-size: 13px;
        }

        .version-item:last-child {
            border-bottom: none;
        }

        .version-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .version-number {
            font-weight: 600;
            color: #212529;
        }

        .version-date {
            color: #6c757d;
            font-size: 12px;
        }

        .version-author {
            color: #6c757d;
            font-size: 12px;
        }

        .version-action {
            margin-top: 8px;
        }

        .version-action a {
            color: #0d6efd;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }

        .version-action a:hover {
            text-decoration: underline;
        }

        /* Comments Section */
        .comment {
            padding: 12px;
            background: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .comment-author {
            font-weight: 600;
            color: #212529;
            font-size: 13px;
        }

        .comment-time {
            color: #6c757d;
            font-size: 12px;
        }

        .comment-text {
            color: #495057;
            font-size: 13px;
            line-height: 1.5;
        }

        .comment-form {
            margin-top: 15px;
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
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
            color: white;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .document-container {
                grid-template-columns: 1fr;
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

            .preview-actions {
                flex-wrap: wrap;
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

            .preview-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .preview-actions {
                width: 100%;
            }

            .preview-actions button {
                flex: 1;
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
            <h1><i class="bi bi-file-earmark"></i> Budget 2025</h1>
        </div>

        <!-- Document Container -->
        <div class="document-container">
            <!-- Document Preview -->
            <div class="document-preview">
                <div class="preview-header">
                    <h5>Document Preview</h5>
                    <div class="preview-actions">
                        <button class="btn-small"><i class="bi bi-download"></i> Download</button>
                        <button class="btn-small-secondary"><i class="bi bi-printer"></i> Print</button>
                    </div>
                </div>
                <div class="preview-content">
                    <div class="preview-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                    <div class="preview-text">PDF Document Preview</div>
                    <small style="color: #999;">Document preview functionality can be integrated with PDF.js or similar libraries</small>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="document-sidebar">
                <!-- Document Info -->
                <div class="sidebar-card">
                    <h6><i class="bi bi-info-circle"></i> Document Information</h6>
                    <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                    <div class="info-row">
                        <span class="info-label">Current Version:</span>
                        <span class="info-value">v2.1</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">File Size:</span>
                        <span class="info-value">2.5 MB</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">File Type:</span>
                        <span class="info-value">PDF</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Created:</span>
                        <span class="info-value">2024-10-15</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Modified:</span>
                        <span class="info-value">2024-11-28</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Created By:</span>
                        <span class="info-value">Sarah Smith</span>
                    </div>
                </div>

                <!-- Versions -->
                <div class="sidebar-card">
                    <h6><i class="bi bi-clock-history"></i> Version History
                        <span style="float: right;"><a href="audit-trail.html">view audit trail</a></span>      
                    </h6>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="versions-tab" data-bs-toggle="tab" data-bs-target="#versions" type="button" role="tab">
                                Versions
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="versions" role="tabpanel">
                            <div class="version-item">
                                <div class="version-header">
                                    <span class="version-number">v2.1</span>
                                    <span class="version-date">2024-11-28</span>
                                </div>
                                <div class="version-author">By: Mike Johnson</div>
                                <div class="version-action">
                                    <a href="#" onclick="viewVersion('v2.1')">View</a> | 
                                    <a href="#" onclick="downloadVersion('v2.1')">Download</a>
                                </div>
                            </div>

                            <div class="version-item">
                                <div class="version-header">
                                    <span class="version-number">v2.0</span>
                                    <span class="version-date">2024-11-15</span>
                                </div>
                                <div class="version-author">By: Sarah Smith</div>
                                <div class="version-action">
                                    <a href="#" onclick="viewVersion('v2.0')">View</a> | 
                                    <a href="#" onclick="downloadVersion('v2.0')">Download</a>
                                </div>
                            </div>

                            <div class="version-item">
                                <div class="version-header">
                                    <span class="version-number">v1.5</span>
                                    <span class="version-date">2024-11-01</span>
                                </div>
                                <div class="version-author">By: Sarah Smith</div>
                                <div class="version-action">
                                    <a href="#" onclick="viewVersion('v1.5')">View</a> | 
                                    <a href="#" onclick="downloadVersion('v1.5')">Download</a>
                                </div>
                            </div>

                            <div class="version-item">
                                <div class="version-header">
                                    <span class="version-number">v1.0</span>
                                    <span class="version-date">2024-10-15</span>
                                </div>
                                <div class="version-author">By: Sarah Smith</div>
                                <div class="version-action">
                                    <a href="#" onclick="viewVersion('v1.0')">View</a> | 
                                    <a href="#" onclick="downloadVersion('v1.0')">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="sidebar-card">
                    <h6><i class="bi bi-chat-dots"></i> Comments & Notes (3)</h6>
                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author">Sarah Smith</span>
                            <span class="comment-time">2 days ago</span>
                        </div>
                        <div class="comment-text">Please review the budget allocation for Q4. The figures have been updated based on the latest financial data.</div>
                    </div>

                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author">Mike Johnson</span>
                            <span class="comment-time">1 day ago</span>
                        </div>
                        <div class="comment-text">Reviewed and approved. The budget looks good. Minor adjustments made to the IT department allocation.</div>
                    </div>

                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author">John Doe</span>
                            <span class="comment-time">12 hours ago</span>
                        </div>
                        <div class="comment-text">Final approval given. Document is ready for implementation. Great work on the detailed breakdown.</div>
                    </div>

                    <div class="comment-form">
                        <textarea class="form-control" rows="3" placeholder="Add a comment..." id="newComment"></textarea>
                        <button class="btn-primary" onclick="addComment()"><i class="bi bi-send"></i> Add Comment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewVersion(version) {
            alert('Loading version ' + version + '... (This is a prototype)');
        }

        function downloadVersion(version) {
            alert('Downloading version ' + version + '... (This is a prototype)');
        }

        function addComment() {
            const comment = document.getElementById('newComment').value;
            if (comment.trim()) {
                alert('Comment added successfully! (This is a prototype)\n\nComment: ' + comment);
                document.getElementById('newComment').value = '';
            } else {
                alert('Please enter a comment.');
            }
        }
    </script>
</body>
</html>
