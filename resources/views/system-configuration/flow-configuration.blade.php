<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow Configuration - Document Management System</title>
    
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

        /* Flow Card */
        .flow-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .flow-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .flow-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }

        .flow-title {
            font-size: 16px;
            font-weight: 600;
            color: #212529;
        }

        .flow-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background-color: #d4edda;
            color: #155724;
        }

        .flow-step {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            color: #6c757d;
        }

        .flow-step-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #0d6efd;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .flow-arrow {
            display: flex;
            justify-content: center;
            margin: 10px 0;
            color: #0d6efd;
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

            .flow-header {
                flex-direction: column;
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
            <li><a href="flow-configuration.html" class="active"><i class="bi bi-gear"></i> Flow Configuration</a></li>
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
            <li><a href="flow-configuration" class="active"><i class="bi bi-gear"></i> Flow Configuration</a></li>
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
            <h1><i class="bi bi-gear"></i> Flow Configuration</h1>
            <p>Create and manage document approval workflows.</p>
        </div>

        <!-- Existing Flows -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Configured Approval Flows</h5>
                    <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#createFlowModal"><i class="bi bi-plus-circle"></i> Create New Flow</button>
                </div>
            </div>
            <div class="card-body">
                <!-- Flow 1 -->
                <div class="flow-card">
                    <div class="flow-header">
                        <div>
                            <div class="flow-title"><i class="bi bi-diagram-3"></i> Standard Approval Flow</div>
                            <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For general documents</div>
                        </div>
                        <div>
                            <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                        <div class="flow-step">
                            <div class="flow-step-icon">1</div>
                            <div>
                                <strong>Initial Submission</strong> - Document uploaded by user
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">2</div>
                            <div>
                                <strong>Department Head Review</strong> - Finance Department Head approval
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">3</div>
                            <div>
                                <strong>Final Approval</strong> - Executive Director approval
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                        <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                        <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>

                <!-- Flow 2 -->
                <div class="flow-card">
                    <div class="flow-header">
                        <div>
                            <div class="flow-title"><i class="bi bi-diagram-3"></i> Financial Review Flow</div>
                            <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For financial documents and budgets</div>
                        </div>
                        <div>
                            <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                        <div class="flow-step">
                            <div class="flow-step-icon">1</div>
                            <div>
                                <strong>Initial Submission</strong> - Document uploaded by user
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">2</div>
                            <div>
                                <strong>Finance Manager Review</strong> - Finance Manager approval
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">3</div>
                            <div>
                                <strong>CFO Approval</strong> - Chief Financial Officer approval
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">4</div>
                            <div>
                                <strong>Executive Sign-off</strong> - CEO final approval
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                        <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                        <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>

                <!-- Flow 3 -->
                <div class="flow-card">
                    <div class="flow-header">
                        <div>
                            <div class="flow-title"><i class="bi bi-diagram-3"></i> Compliance Review Flow</div>
                            <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For compliance and audit documents</div>
                        </div>
                        <div>
                            <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                        <div class="flow-step">
                            <div class="flow-step-icon">1</div>
                            <div>
                                <strong>Initial Submission</strong> - Document uploaded by user
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">2</div>
                            <div>
                                <strong>Compliance Officer Review</strong> - Compliance Officer approval
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">3</div>
                            <div>
                                <strong>Legal Review</strong> - Legal Department approval
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-step">
                            <div class="flow-step-icon">4</div>
                            <div>
                                <strong>Final Approval</strong> - Executive Director approval
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                        <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                        <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Flow Modal -->
    <div class="modal fade" id="createFlowModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Create New Approval Flow</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createFlowForm">
                        <div class="mb-3">
                            <label for="flowName" class="form-label">Flow Name <span style="color: #dc3545;">*</span></label>
                            <input type="text" class="form-control" id="flowName" placeholder="e.g., HR Review Flow" required>
                        </div>

                        <div class="mb-3">
                            <label for="flowDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="flowDescription" rows="3" placeholder="Describe the purpose of this flow"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="docType" class="form-label">Document Type <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="docType" required>
                                <option value="">Select Document Type</option>
                                <option value="financial">Financial</option>
                                <option value="project">Project</option>
                                <option value="hr">HR</option>
                                <option value="compliance">Compliance</option>
                                <option value="budget">Budget</option>
                                <option value="policy">Policy</option>
                            </select>
                        </div>

                        <h6 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Approval Steps</h6>

                        <div class="mb-3">
                            <label for="step1User" class="form-label">Step 1 - First Approver <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="step1User" required>
                                <option value="">Select User/Role</option>
                                <option value="dept-head">Department Head</option>
                                <option value="manager">Manager</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="step2User" class="form-label">Step 2 - Second Approver</label>
                            <select class="form-control" id="step2User">
                                <option value="">Select User/Role (Optional)</option>
                                <option value="director">Director</option>
                                <option value="cfo">CFO</option>
                                <option value="ceo">CEO</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="step3User" class="form-label">Step 3 - Final Approver</label>
                            <select class="form-control" id="step3User">
                                <option value="">Select User/Role (Optional)</option>
                                <option value="executive">Executive Director</option>
                                <option value="ceo">CEO</option>
                                <option value="board">Board Member</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" id="requireComment">
                                <span>Require comments at each approval step</span>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" id="allowReject" checked>
                                <span>Allow rejection with comments</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createFlow()"><i class="bi bi-check"></i> Create Flow</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function createFlow() {
            alert('Flow created successfully! (This is a prototype)');
            document.getElementById('createFlowForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('createFlowModal'));
            modal.hide();
        }
    </script>
</body>
</html>
