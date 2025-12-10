@extends('layouts.app')

    @section('title', 'Document Explorer')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/document-view.css') }}">
    @endpush

    <!-- Main Content -->

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
                        <span style="float: right;"><a href="{{route('audit-trail')}}">view audit trail</a></span>      
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
@endsection
