<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Hierarchy - Document Management System</title>
    
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

        /* Hierarchy Tree */
        .hierarchy-tree {
            margin-top: 20px;
        }

        .hierarchy-level {
            margin-left: 30px;
            margin-bottom: 20px;
            padding-left: 20px;
            border-left: 2px solid #dee2e6;
        }

        .hierarchy-level:first-child {
            margin-left: 0;
            border-left: none;
            padding-left: 0;
        }

        .hierarchy-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hierarchy-item-info {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .hierarchy-item-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 12px;
        }

        .hierarchy-item-details h6 {
            margin: 0;
            font-weight: 600;
            color: #212529;
        }

        .hierarchy-item-details p {
            margin: 5px 0 0 0;
            font-size: 12px;
            color: #6c757d;
        }

        .hierarchy-item-actions {
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

        .btn-small-danger {
            background-color: #dc3545;
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

        .btn-small-danger:hover {
            background-color: #c82333;
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

            .hierarchy-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .hierarchy-item-actions {
                width: 100%;
                margin-top: 10px;
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
            <li><a href="user-hierarchy.html" class="active"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
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
            <li><a href="user-hierarchy" class="active"><i class="bi bi-diagram-3"></i> User Hierarchy</a></li>
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
            <h1><i class="bi bi-diagram-3"></i> User Hierarchy</h1>
            <p>Manage organizational structure and user roles.</p>
        </div>

        <!-- User Hierarchy -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Organization Structure</h5>
                    <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-person-plus"></i> Add User</button>
                </div>
            </div>
            <div class="card-body">
                <!-- CEO Level -->
                <div class="hierarchy-tree">
                    <h6 style="margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 1 - Executive</h6>
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">AD</div>
                            <div class="hierarchy-item-details">
                                <h6>Admin Director</h6>
                                <p>Role: System Administrator | Department: Executive</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>

                    <!-- Department Heads -->
                    <h6 style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 2 - Department Heads</h6>
                    
                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">JD</div>
                                <div class="hierarchy-item-details">
                                    <h6>John Doe</h6>
                                    <p>Role: Department Head | Department: Finance</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">SS</div>
                                <div class="hierarchy-item-details">
                                    <h6>Sarah Smith</h6>
                                    <p>Role: Department Head | Department: HR</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">MJ</div>
                                <div class="hierarchy-item-details">
                                    <h6>Mike Johnson</h6>
                                    <p>Role: Department Head | Department: Operations</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Team Members -->
                    <h6 style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 3 - Team Members</h6>
                    
                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">AK</div>
                                <div class="hierarchy-item-details">
                                    <h6>Alex Kumar</h6>
                                    <p>Role: Senior Analyst | Department: Finance | Reports to: John Doe</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">EW</div>
                                <div class="hierarchy-item-details">
                                    <h6>Emma Wilson</h6>
                                    <p>Role: HR Specialist | Department: HR | Reports to: Sarah Smith</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="hierarchy-level">
                        <div class="hierarchy-item">
                            <div class="hierarchy-item-info">
                                <div class="hierarchy-item-avatar">DB</div>
                                <div class="hierarchy-item-details">
                                    <h6>David Brown</h6>
                                    <p>Role: Operations Manager | Department: Operations | Reports to: Mike Johnson</p>
                                </div>
                            </div>
                            <div class="hierarchy-item-actions">
                                <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-plus"></i> Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-control" id="userRole" required>
                                <option value="">Select Role</option>
                                <option value="admin">Administrator</option>
                                <option value="dept-head">Department Head</option>
                                <option value="approver">Approver</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userDept" class="form-label">Department</label>
                            <select class="form-control" id="userDept" required>
                                <option value="">Select Department</option>
                                <option value="finance">Finance</option>
                                <option value="hr">HR</option>
                                <option value="operations">Operations</option>
                                <option value="it">IT</option>
                                <option value="marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userReportsTo" class="form-label">Reports To</label>
                            <select class="form-control" id="userReportsTo">
                                <option value="">Select Supervisor</option>
                                <option value="admin">Admin Director</option>
                                <option value="john">John Doe (Finance)</option>
                                <option value="sarah">Sarah Smith (HR)</option>
                                <option value="mike">Mike Johnson (Operations)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addUser()"><i class="bi bi-check"></i> Add User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addUser() {
            alert('User added successfully! (This is a prototype)');
            document.getElementById('addUserForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }
    </script>
</body>
</html>
