<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration - Document Management System</title>
    
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

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
            display: block;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-text {
            display: block;
            margin-top: 5px;
            font-size: 12px;
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

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* File Type List */
        .file-type-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file-type-item-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-type-icon {
            font-size: 24px;
            color: #0d6efd;
        }

        .file-type-details h6 {
            margin: 0;
            font-weight: 600;
            color: #212529;
        }

        .file-type-details p {
            margin: 5px 0 0 0;
            font-size: 12px;
            color: #6c757d;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.3s;
            border-radius: 24px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: #0d6efd;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
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

            .file-type-item {
                flex-direction: column;
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
            <li><a href="approvals.html"><i class="bi bi-check-circle"></i> Approvals</a></li>
            <li><a href="user-hierarchy.html"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
            <li><a href="flow-configuration.html"><i class="bi bi-gear"></i> Flow Configuration</a></li>
            <li><a href="permissions.html"><i class="bi bi-shield-lock"></i> Permissions</a></li>
            <li><a href="configuration.html" class="active"><i class="bi bi-sliders"></i> Configuration</a></li>
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
            <h1><i class="bi bi-sliders"></i> Configuration</h1>
            <p>Configure system settings and file upload restrictions.</p>
        </div>

        <!-- File Upload Settings -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-cloud-upload"></i> File Upload Settings</h5>
            </div>
            <div class="card-body">
                <form id="uploadSettingsForm">
                    <div class="form-group">
                        <label for="maxFileSize" class="form-label">Maximum File Size (MB) <span style="color: #dc3545;">*</span></label>
                        <input type="number" class="form-control" id="maxFileSize" value="50" min="1" max="1000" required>
                        <span class="form-text">Maximum size for a single file upload</span>
                    </div>

                    <div class="form-group">
                        <label for="maxTotalSize" class="form-label">Maximum Total Size per Document (MB) <span style="color: #dc3545;">*</span></label>
                        <input type="number" class="form-control" id="maxTotalSize" value="500" min="1" max="5000" required>
                        <span class="form-text">Maximum total size for all files in a single document upload</span>
                    </div>

                    <div class="form-group">
                        <label for="maxFiles" class="form-label">Maximum Number of Files per Document <span style="color: #dc3545;">*</span></label>
                        <input type="number" class="form-control" id="maxFiles" value="10" min="1" max="100" required>
                        <span class="form-text">Maximum number of files that can be uploaded in a single document</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Virus Scanning <span style="color: #dc3545;">*</span></label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                            <span>Enable virus scanning for uploaded files</span>
                        </div>
                        <span class="form-text">Automatically scan files for malware and viruses</span>
                    </div>

                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check"></i> Save Settings</button>
                        <button type="reset" class="btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Allowed File Types -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-file-type-pdf"></i> Allowed File Types</h5>
            </div>
            <div class="card-body">
                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-pdf"></i></div>
                        <div class="file-type-details">
                            <h6>PDF</h6>
                            <p>Portable Document Format</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-word"></i></div>
                        <div class="file-type-details">
                            <h6>DOCX</h6>
                            <p>Microsoft Word Document</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-excel"></i></div>
                        <div class="file-type-details">
                            <h6>XLSX</h6>
                            <p>Microsoft Excel Spreadsheet</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-ppt"></i></div>
                        <div class="file-type-details">
                            <h6>PPTX</h6>
                            <p>Microsoft PowerPoint Presentation</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-text"></i></div>
                        <div class="file-type-details">
                            <h6>TXT</h6>
                            <p>Plain Text File</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-image"></i></div>
                        <div class="file-type-details">
                            <h6>JPG/PNG</h6>
                            <p>Image Files</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="bi bi-file-zip"></i></div>
                        <div class="file-type-details">
                            <h6>ZIP</h6>
                            <p>Compressed Archive</p>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div style="margin-top: 20px;">
                    <button class="btn-primary" onclick="saveFileTypes()"><i class="bi bi-check"></i> Save File Type Settings</button>
                </div>
            </div>
        </div>

        <!-- System Settings -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-gear"></i> System Settings</h5>
            </div>
            <div class="card-body">
                <form id="systemSettingsForm">
                    <div class="form-group">
                        <label for="appName" class="form-label">Application Name</label>
                        <input type="text" class="form-control" id="appName" value="Document Management System">
                    </div>

                    <div class="form-group">
                        <label for="appVersion" class="form-label">System Version</label>
                        <input type="text" class="form-control" id="appVersion" value="1.0.0" disabled>
                    </div>

                    <div class="form-group">
                        <label for="supportEmail" class="form-label">Support Email</label>
                        <input type="email" class="form-control" id="supportEmail" value="support@example.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Notifications <span style="color: #dc3545;">*</span></label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                            <span>Send email notifications for document approvals and updates</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Document Versioning <span style="color: #dc3545;">*</span></label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                            <span>Keep version history for all documents</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="retentionDays" class="form-label">Document Retention Period (Days)</label>
                        <input type="number" class="form-control" id="retentionDays" value="365" min="30" max="3650">
                        <span class="form-text">Number of days to retain archived documents</span>
                    </div>

                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check"></i> Save Settings</button>
                        <button type="reset" class="btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('uploadSettingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Upload settings saved successfully! (This is a prototype)');
        });

        document.getElementById('systemSettingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('System settings saved successfully! (This is a prototype)');
        });

        function saveFileTypes() {
            alert('File type settings saved successfully! (This is a prototype)');
        }
    </script>
</body>
</html>
