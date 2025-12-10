<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document - Document Management System</title>
    
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

        /* Forms */
        .form-group {
            margin-bottom: 20px;
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

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* File Upload Area */
        .file-upload-area {
            border: 2px dashed #0d6efd;
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            background-color: #f0f7ff;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload-area:hover {
            background-color: #e7f3ff;
            border-color: #0b5ed7;
        }

        .file-upload-area.drag-over {
            background-color: #e7f3ff;
            border-color: #0b5ed7;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .file-upload-icon {
            font-size: 48px;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .file-upload-text {
            color: #212529;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .file-upload-subtext {
            color: #6c757d;
            font-size: 14px;
        }

        #fileInput {
            display: none;
        }

        /* File List */
        .file-list {
            margin-top: 20px;
        }

        .file-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file-item-info {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .file-item-icon {
            font-size: 24px;
            color: #0d6efd;
        }

        .file-item-details {
            flex: 1;
        }

        .file-item-name {
            font-weight: 600;
            color: #212529;
        }

        .file-item-size {
            font-size: 12px;
            color: #6c757d;
        }

        .file-item-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 18px;
        }

        /* Tags Input */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            min-height: 40px;
            align-items: center;
        }

        .tag-item {
            background-color: #e7f3ff;
            color: #0d6efd;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tag-item button {
            background: none;
            border: none;
            color: #0d6efd;
            cursor: pointer;
            font-size: 14px;
            padding: 0;
        }

        .tags-input {
            border: none;
            outline: none;
            flex: 1;
            min-width: 100px;
            font-size: 14px;
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

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
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

            .button-group {
                flex-direction: column;
            }

            .button-group button {
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

            .file-upload-area {
                padding: 30px 15px;
            }

            .file-upload-icon {
                font-size: 36px;
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
            <li><a href="upload.html" class="active"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
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
            <li><a href="upload" class="active"><i class="bi bi-cloud-upload"></i> Upload Document</a></li>
            <li><a href="approvals"><i class="bi bi-check-circle"></i> Approvals</a></li>
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
            <h1><i class="bi bi-cloud-upload"></i> Upload Document</h1>
            <p>Upload a new document to the system.</p>
        </div>

        <!-- Upload Form -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-file-earmark-arrow-up"></i> Document Details</h5>
                    </div>
                    <div class="card-body">
                        <form id="uploadForm">
                            <!-- Document Title -->
                            <div class="form-group">
                                <label for="docTitle" class="form-label">Document Title <span style="color: #dc3545;">*</span></label>
                                <input type="text" class="form-control" id="docTitle" placeholder="Enter document title" required>
                            </div>

                            <!-- Document Description -->
                            <div class="form-group">
                                <label for="docDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="docDescription" placeholder="Enter document description (optional)"></textarea>
                            </div>

                            <!-- Document Type -->
                            <div class="form-group">
                                <label for="docType" class="form-label">Document Type <span style="color: #dc3545;">*</span></label>
                                <select class="form-control" id="docType" required>
                                    <option value="">Select Document Type</option>
                                    <option value="financial">Financial</option>
                                    <option value="project">Project</option>
                                    <option value="hr">HR</option>
                                    <option value="compliance">Compliance</option>
                                    <option value="budget">Budget</option>
                                    <option value="policy">Policy</option>
                                    <option value="report">Report</option>
                                    <option value="contract">Contract</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Tags -->
                            <div class="form-group">
                                <label for="docTags" class="form-label">Tags</label>
                                <div class="tags-container" id="tagsContainer">
                                    <input type="text" class="tags-input" id="docTags" placeholder="Add tags (press Enter)">
                                </div>
                                <small class="text-muted">Add relevant tags to help categorize and search documents</small>
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label class="form-label">Upload Files <span style="color: #dc3545;">*</span></label>
                                <div class="file-upload-area" id="fileUploadArea">
                                    <div class="file-upload-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                                    <div class="file-upload-text">Drag and drop files here or click to browse</div>
                                    <div class="file-upload-subtext">Supported formats: PDF, DOCX, XLSX, PPT, TXT, JPG, PNG</div>
                                </div>
                                <input type="file" id="fileInput" multiple>
                                <div class="file-list" id="fileList"></div>
                            </div>

                            <!-- Approval Flow -->
                            <div class="form-group">
                                <label for="approvalFlow" class="form-label">Approval Flow <span style="color: #dc3545;">*</span></label>
                                <select class="form-control" id="approvalFlow" required>
                                    <option value="">Select Approval Flow</option>
                                    <option value="standard">Standard Approval</option>
                                    <option value="financial">Financial Review</option>
                                    <option value="compliance">Compliance Review</option>
                                    <option value="hr">HR Review</option>
                                    <option value="executive">Executive Approval</option>
                                </select>
                                <small class="text-muted">Select the approval workflow for this document</small>
                            </div>

                            <!-- Visibility -->
                            <div class="form-group">
                                <label class="form-label">Document Visibility</label>
                                <div style="display: flex; gap: 20px;">
                                    <div>
                                        <input type="radio" id="visPublic" name="visibility" value="public" checked>
                                        <label for="visPublic" style="margin-left: 8px; cursor: pointer;">Public (All users can view)</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="visPrivate" name="visibility" value="private">
                                        <label for="visPrivate" style="margin-left: 8px; cursor: pointer;">Private (Only approvers can view)</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="button-group">
                                <button type="submit" class="btn-primary"><i class="bi bi-cloud-upload"></i> Upload Document</button>
                                <button type="reset" class="btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Clear Form</button>
                                <a href="documents.html" class="btn-secondary"><i class="bi bi-x-circle"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Upload Guidelines -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-info-circle"></i> Upload Guidelines</h5>
                    </div>
                    <div class="card-body">
                        <h6 style="margin-bottom: 15px; font-weight: 600;">File Requirements</h6>
                        <ul style="margin-bottom: 20px; padding-left: 20px;">
                            <li>Maximum file size: 50 MB</li>
                            <li>Supported formats: PDF, DOCX, XLSX, PPT, TXT, JPG, PNG</li>
                            <li>Multiple files can be uploaded at once</li>
                        </ul>

                        <h6 style="margin-bottom: 15px; font-weight: 600;">Best Practices</h6>
                        <ul style="margin-bottom: 20px; padding-left: 20px;">
                            <li>Use clear, descriptive titles</li>
                            <li>Add relevant tags for easy searching</li>
                            <li>Include a detailed description</li>
                            <li>Select the appropriate document type</li>
                            <li>Choose the correct approval flow</li>
                        </ul>

                        <h6 style="margin-bottom: 15px; font-weight: 600;">What Happens Next?</h6>
                        <p style="margin: 0; color: #6c757d; font-size: 14px;">
                            After uploading, your document will be routed through the selected approval flow. You'll receive notifications as the document moves through each approval stage.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // File Upload Handling
        const fileUploadArea = document.getElementById('fileUploadArea');
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');
        let uploadedFiles = [];

        fileUploadArea.addEventListener('click', () => fileInput.click());

        fileUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUploadArea.classList.add('drag-over');
        });

        fileUploadArea.addEventListener('dragleave', () => {
            fileUploadArea.classList.remove('drag-over');
        });

        fileUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUploadArea.classList.remove('drag-over');
            handleFiles(e.dataTransfer.files);
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            for (let file of files) {
                if (!uploadedFiles.find(f => f.name === file.name)) {
                    uploadedFiles.push(file);
                }
            }
            displayFiles();
        }

        function displayFiles() {
            fileList.innerHTML = '';
            uploadedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
                    <div class="file-item-info">
                        <div class="file-item-icon"><i class="bi bi-file"></i></div>
                        <div class="file-item-details">
                            <div class="file-item-name">${file.name}</div>
                            <div class="file-item-size">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                        </div>
                    </div>
                    <button type="button" class="file-item-remove" onclick="removeFile(${index})"><i class="bi bi-trash"></i></button>
                `;
                fileList.appendChild(fileItem);
            });
        }

        function removeFile(index) {
            uploadedFiles.splice(index, 1);
            displayFiles();
        }

        // Tags Handling
        const tagsContainer = document.getElementById('tagsContainer');
        const tagsInput = document.getElementById('docTags');
        let tags = [];

        tagsInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tag = tagsInput.value.trim();
                if (tag && !tags.includes(tag)) {
                    tags.push(tag);
                    tagsInput.value = '';
                    displayTags();
                }
            }
        });

        function displayTags() {
            const tagItems = document.querySelectorAll('.tag-item');
            tagItems.forEach(item => item.remove());

            tags.forEach((tag, index) => {
                const tagItem = document.createElement('div');
                tagItem.className = 'tag-item';
                tagItem.innerHTML = `
                    ${tag}
                    <button type="button" onclick="removeTag(${index})">×</button>
                `;
                tagsContainer.insertBefore(tagItem, tagsInput);
            });
        }

        function removeTag(index) {
            tags.splice(index, 1);
            displayTags();
        }

        // Form Submission
        document.getElementById('uploadForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Document uploaded successfully! (This is a prototype)');
        });
    </script>
</body>
</html>
