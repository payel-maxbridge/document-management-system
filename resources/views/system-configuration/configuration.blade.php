   @extends('layouts.app')

    @section('title', 'Configuration')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/configuration.css') }}">
    @endpush

    <!-- Main Content -->

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
@endsection
