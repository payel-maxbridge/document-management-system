   @extends('layouts.app')

    @section('title', 'Audit trail')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/audit-trail.css') }}">
    @endpush

    <!-- Main Content -->

        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-clock-history"></i> Audit Trail</h1>
            <p>Track all document activities, approvals, and user actions.</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="form-group">
                <label for="filterDocument" class="form-label">Document Name</label>
                <input type="text" class="form-control" id="filterDocument" placeholder="Search document...">
            </div>
            <div class="form-group">
                <label for="filterAction" class="form-label">Action Type</label>
                <select class="form-control" id="filterAction">
                    <option value="">All Actions</option>
                    <option value="created">Created</option>
                    <option value="uploaded">Uploaded</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="commented">Commented</option>
                    <option value="downloaded">Downloaded</option>
                    <option value="versioned">Versioned</option>
                </select>
            </div>
            <div class="form-group">
                <label for="filterUser" class="form-label">User</label>
                <input type="text" class="form-control" id="filterUser" placeholder="Filter by user...">
            </div>
            <div class="form-group">
                <label for="filterDate" class="form-label">Date Range</label>
                <input type="date" class="form-control" id="filterDate">
            </div>
            <div class="form-group">
                <label>&nbsp;</label>
                <button class="btn-primary" onclick="applyFilters()"><i class="bi bi-search"></i> Apply Filters</button>
            </div>
        </div>

        <!-- Timeline -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-clock-history"></i> Activity Timeline</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <!-- Activity 1 -->
                    <div class="timeline-item">
                        <div class="timeline-dot success"><i class="bi bi-check-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-approved">APPROVED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> John Doe (Department Head)</div>
                                </div>
                                <div class="timeline-time">2024-11-28 10:30 AM</div>
                            </div>
                            <div class="timeline-description">
                                Document approved with comment: "Final approval given. Document is ready for implementation."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Status:</strong> Approved | <strong>Flow:</strong> Financial Review Flow
                            </div>
                        </div>
                    </div>

                    <!-- Activity 2 -->
                    <div class="timeline-item">
                        <div class="timeline-dot warning"><i class="bi bi-chat-dots"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-commented">COMMENTED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-27 2:15 PM</div>
                            </div>
                            <div class="timeline-description">
                                Added comment: "Reviewed and approved. The budget looks good. Minor adjustments made to the IT department allocation."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Comment Type:</strong> Approval Comment
                            </div>
                        </div>
                    </div>

                    <!-- Activity 3 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v2.1</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-26 9:45 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.5 MB. Changes: Updated Q4 projections and IT budget allocation.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.1 | <strong>Previous Version:</strong> v2.0 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 4 -->
                    <div class="timeline-item">
                        <div class="timeline-dot success"><i class="bi bi-check-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-approved">APPROVED</span> Budget 2025 - v2.0</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-15 3:20 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document approved at Finance Manager level. Forwarded to Department Head for final approval.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.0 | <strong>Status:</strong> Approved | <strong>Next Step:</strong> Final Approval
                            </div>
                        </div>
                    </div>

                    <!-- Activity 5 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v2.0</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-15 10:00 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.3 MB. Changes: Revised budget figures based on latest financial data.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v2.0 | <strong>Previous Version:</strong> v1.5 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 6 -->
                    <div class="timeline-item">
                        <div class="timeline-dot danger"><i class="bi bi-x-circle"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-rejected">REJECTED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 4:30 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document rejected with comment: "Budget figures need revision. Please update the allocation for IT department and resubmit."
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Status:</strong> Rejected | <strong>Reason:</strong> Requires Revision
                            </div>
                        </div>
                    </div>

                    <!-- Activity 7 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-download"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-downloaded">DOWNLOADED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Mike Johnson (Finance Manager)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 2:15 PM</div>
                            </div>
                            <div class="timeline-description">
                                Document downloaded for review. File size: 2.1 MB.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Download Method:</strong> Direct Download
                            </div>
                        </div>
                    </div>

                    <!-- Activity 8 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-uploaded">UPLOADED</span> Budget 2025 - v1.5</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-11-01 10:30 AM</div>
                            </div>
                            <div class="timeline-description">
                                New version uploaded. File size: 2.1 MB. Changes: Added detailed breakdown of departmental budgets.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.5 | <strong>Previous Version:</strong> v1.0 | <strong>File Type:</strong> PDF
                            </div>
                        </div>
                    </div>

                    <!-- Activity 9 -->
                    <div class="timeline-item">
                        <div class="timeline-dot info"><i class="bi bi-file-earmark-plus"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <div class="timeline-title"><span class="activity-badge badge-created">CREATED</span> Budget 2025</div>
                                    <div class="timeline-user"><i class="bi bi-person"></i> Sarah Smith (Finance Officer)</div>
                                </div>
                                <div class="timeline-time">2024-10-15 9:00 AM</div>
                            </div>
                            <div class="timeline-description">
                                Document created and uploaded. Initial version: v1.0. File size: 1.8 MB. Category: Financial Documents.
                            </div>
                            <div class="timeline-details">
                                <strong>Version:</strong> v1.0 | <strong>Status:</strong> Submitted | <strong>File Type:</strong> PDF | <strong>Category:</strong> Financial
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <script>
        function applyFilters() {
            const document = document.getElementById('filterDocument').value;
            const action = document.getElementById('filterAction').value;
            const user = document.getElementById('filterUser').value;
            const date = document.getElementById('filterDate').value;

            alert('Filters applied! (This is a prototype)\n\nDocument: ' + (document || 'All') + '\nAction: ' + (action || 'All') + '\nUser: ' + (user || 'All') + '\nDate: ' + (date || 'All'));
        }
    </script>
@endsection
