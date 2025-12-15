    @extends('layouts.app')

    @section('title', 'Upload Document')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/document-upload.css') }}">
    @endpush

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
                            <!-- <div class="form-group">
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
                            </div> -->

                            <div class="form-group">
                                <label for="docType" class="form-label">
                                    Document Type <span style="color: #dc3545;">*</span>
                                </label>

                                <select class="form-control" id="docType" name="doc_type" required>
                                    <option value="">Select Document Type</option>

                                    @foreach(document_types() as $label => $value)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
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
                                    <div class="file-upload-subtext">Supported formats: {{ strtoupper(implode(', ', $data->allowed_file_type ?? [])) }}</div>
                                </div>
                                <input type="file" id="fileInput" multiple>
                                <div class="file-list" id="fileList"></div>
                            </div>

                            <!-- Approval Flow -->
                            <!-- <div class="form-group">
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
                            </div> -->
                            <div class="form-group">
                                <label for="approvalFlow" class="form-label">Approval Flow 
                                    <span style="color: #dc3545;">*</span>
                                </label>
                                <select class="form-control" name="approval_flow" id="approvalFlow">
                                    <option value="">Select Approval Flow</option>
                                    @foreach(approval_flows() as $label => $value)
                                        <option value="{{$value}}">{{$label}}</option>
                                    @endforeach
                                </select>
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
                            <li>Maximum file size: {{ $data->max_file_size}} MB</li>
                            <li>Supported formats: {{ strtoupper(implode(', ', $data->allowed_file_type ?? [])) }}</li>
                            <li>{{ $data->max_no_files}} files can be uploaded at once</li>
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
@endsection
