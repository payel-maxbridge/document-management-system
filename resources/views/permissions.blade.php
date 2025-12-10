<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions - Document Management System</title>
    
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

        /* Permission Matrix */
        .permission-matrix {
            overflow-x: auto;
        }

        .permission-table {
            width: 100%;
            border-collapse: collapse;
        }

        .permission-table thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .permission-table th {
            font-weight: 600;
            color: #212529;
            padding: 15px;
            text-align: left;
            border: none;
        }

        .permission-table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .permission-table tbody tr {
            transition: all 0.3s ease;
        }

        .permission-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .role-name {
            font-weight: 600;
            color: #212529;
        }

        .permission-cell {
            text-align: center;
        }

        .checkbox-wrapper {
            display: flex;
            justify-content: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .permission-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .permission-allowed {
            background-color: #d4edda;
            color: #155724;
        }

        .permission-denied {
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

        .btn-secondary:hover {
            background-color: #5a6268;
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

            .permission-table th,
            .permission-table td {
                padding: 10px 5px;
                font-size: 12px;
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
            <li><a href="permissions.html" class="active"><i class="bi bi-shield-lock"></i> Permissions</a></li>
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
            <li><a href="permissions" class="active"><i class="bi bi-shield-lock"></i> Permissions</a></li>
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
            <h1><i class="bi bi-shield-lock"></i> Permissions</h1>
            <p>Manage user roles and permissions for document operations.</p>
        </div>

        <!-- Permission Matrix -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-table"></i> Permission Matrix by Role</h5>
            </div>
            <div class="card-body">
                <div class="permission-matrix">
                    <table class="permission-table">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Document Upload</th>
                                <th>Document View</th>
                                <th>Document Approve/Reject</th>
                                <th>Create User</th>
                                <th>Manage Flows</th>
                                <th>System Configuration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="role-name"><i class="bi bi-shield-lock"></i> Administrator</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person-badge"></i> Department Head</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person-check"></i> Approver</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person"></i> Regular User</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-eye"></i> Viewer</td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Editable Permissions -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-pencil-square"></i> Customize Role Permissions</h5>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 20px;">
                    <label for="roleSelect" style="font-weight: 600; margin-bottom: 10px; display: block;">Select Role to Customize</label>
                    <select id="roleSelect" style="padding: 10px 15px; border: 1px solid #dee2e6; border-radius: 6px; width: 100%; max-width: 300px;">
                        <option value="">Select a role</option>
                        <option value="admin">Administrator</option>
                        <option value="dept-head">Department Head</option>
                        <option value="approver">Approver</option>
                        <option value="user">Regular User</option>
                        <option value="viewer">Viewer</option>
                    </select>
                </div>

                <div id="permissionsList" style="display: none;">
                    <h6 style="margin-bottom: 15px; font-weight: 600;">Permissions for Selected Role</h6>
                    
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm1" checked>
                            <label for="perm1" style="margin: 0; cursor: pointer;">
                                <strong>Document Upload</strong> - Allow users to upload new documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm2" checked>
                            <label for="perm2" style="margin: 0; cursor: pointer;">
                                <strong>Document View</strong> - Allow users to view documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm3">
                            <label for="perm3" style="margin: 0; cursor: pointer;">
                                <strong>Document Approve/Reject</strong> - Allow users to approve or reject documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm4">
                            <label for="perm4" style="margin: 0; cursor: pointer;">
                                <strong>Create User</strong> - Allow users to create new user accounts
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm5">
                            <label for="perm5" style="margin: 0; cursor: pointer;">
                                <strong>Manage Flows</strong> - Allow users to create and manage approval flows
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm6">
                            <label for="perm6" style="margin: 0; cursor: pointer;">
                                <strong>System Configuration</strong> - Allow users to configure system settings
                            </label>
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-primary" onclick="savePermissions()"><i class="bi bi-check"></i> Save Changes</button>
                        <button class="btn-secondary" onclick="resetPermissions()"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('roleSelect').addEventListener('change', function() {
            if (this.value) {
                document.getElementById('permissionsList').style.display = 'block';
            } else {
                document.getElementById('permissionsList').style.display = 'none';
            }
        });

        function savePermissions() {
            alert('Permissions updated successfully! (This is a prototype)');
        }

        function resetPermissions() {
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
            });
        }
    </script>
</body>
</html>
