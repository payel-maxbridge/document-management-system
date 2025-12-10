 @extends('layouts.app')

    @section('title', 'Approval')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/approval.css') }}">
    @endpush

    <!-- Main Content -->
        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-check-circle"></i> Approvals</h1>
            <p>Review and approve pending documents.</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
                    <i class="bi bi-hourglass-split"></i> Pending (5)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">
                    <i class="bi bi-check-circle"></i> Approved (12)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">
                    <i class="bi bi-x-circle"></i> Rejected (2)
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Pending Approvals -->
            <div class="tab-pane fade show active" id="pending" role="tabpanel">
                <!-- Urgent Item -->
                <div class="approval-item urgent">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-exclamation-circle"></i> IT Infrastructure Upgrade Plan</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: David Brown | 
                                <i class="bi bi-calendar"></i> 8 days ago
                            </div>
                        </div>
                        <span class="approval-status status-urgent"><i class="bi bi-exclamation-triangle"></i> URGENT (8 days)</span>
                    </div>
                    <div class="approval-description">
                        Comprehensive IT infrastructure upgrade roadmap including server upgrades, network improvements, and security enhancements. Budget: $150,000.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <!-- Normal Items -->
                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Budget Allocation 2025</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Sarah Smith | 
                                <i class="bi bi-calendar"></i> 1 day ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (1 day)</span>
                    </div>
                    <div class="approval-description">
                        Proposed budget allocation for fiscal year 2025 across all departments. Total budget: $2,500,000.
                    </div>
                    <div style="margin-top: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                        <label style="font-weight: 600; color: #212529; margin-bottom: 10px; display: block;">Add Comments (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Add your comments or notes before approving/rejecting..." style="border: 1px solid #dee2e6; border-radius: 6px; padding: 10px 15px; font-size: 14px; margin-bottom: 10px;"></textarea>
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve" onclick="approveWithComment()"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject" onclick="rejectWithComment()"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">HR Policy Update - Remote Work</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Mike Johnson | 
                                <i class="bi bi-calendar"></i> 4 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (4 days)</span>
                    </div>
                    <div class="approval-description">
                        Updated remote work policy guidelines including work-from-home eligibility, approval process, and equipment provisions.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Project Proposal - Website Redesign</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Alex Kumar | 
                                <i class="bi bi-calendar"></i> 2 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (2 days)</span>
                    </div>
                    <div class="approval-description">
                        Comprehensive website redesign proposal with mockups, timeline, and resource requirements. Estimated duration: 6 months.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>

                <div class="approval-item normal">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title">Vendor Contract - ABC Supplies</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> From: Emma Wilson | 
                                <i class="bi bi-calendar"></i> 3 days ago
                            </div>
                        </div>
                        <span class="approval-status status-pending"><i class="bi bi-hourglass-split"></i> Pending (3 days)</span>
                    </div>
                    <div class="approval-description">
                        Annual vendor contract with ABC Supplies for office equipment and supplies. Contract value: $50,000.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-approve"><i class="bi bi-check"></i> Approve</button>
                        <button class="btn-reject"><i class="bi bi-x"></i> Reject</button>
                    </div>
                </div>
            </div>

            <!-- Approved Documents -->
            <div class="tab-pane fade" id="approved" role="tabpanel">
                <div style="padding: 20px; background: white; border-radius: 8px; text-align: center;">
                    <i class="bi bi-check-circle" style="font-size: 48px; color: #28a745; margin-bottom: 15px; display: block;"></i>
                    <h5>12 Documents Approved</h5>
                    <p style="color: #6c757d; margin-bottom: 0;">All approved documents are displayed here with approval dates and approver information.</p>
                </div>
            </div>

            <!-- Rejected Documents -->
            <div class="tab-pane fade" id="rejected" role="tabpanel">
                <div class="approval-item" style="border-left: 4px solid #dc3545; background-color: #fff5f5;">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-x-circle"></i> Budget Allocation 2025 - Draft</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> Rejected by: John Doe | 
                                <i class="bi bi-calendar"></i> 5 days ago
                            </div>
                        </div>
                        <span class="approval-status" style="background-color: #f8d7da; color: #721c24;"><i class="bi bi-x-circle"></i> Rejected</span>
                    </div>
                    <div class="approval-description">
                        <strong>Rejection Reason:</strong> Budget figures need revision. Please update the allocation for IT department and resubmit.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-view" style="background-color: #6c757d;"><i class="bi bi-arrow-repeat"></i> Resubmit</button>
                    </div>
                </div>

                <div class="approval-item" style="border-left: 4px solid #dc3545; background-color: #fff5f5;">
                    <div class="approval-header">
                        <div>
                            <div class="approval-title"><i class="bi bi-x-circle"></i> Training Program Proposal - v1</div>
                            <div class="approval-meta">
                                <i class="bi bi-person"></i> Rejected by: Sarah Smith | 
                                <i class="bi bi-calendar"></i> 10 days ago
                            </div>
                        </div>
                        <span class="approval-status" style="background-color: #f8d7da; color: #721c24;"><i class="bi bi-x-circle"></i> Rejected</span>
                    </div>
                    <div class="approval-description">
                        <strong>Rejection Reason:</strong> Training schedule conflicts with Q1 project timeline. Please reschedule and resubmit.
                    </div>
                    <div class="approval-actions">
                        <button class="btn-view"><i class="bi bi-eye"></i> View Document</button>
                        <button class="btn-view" style="background-color: #6c757d;"><i class="bi bi-arrow-repeat"></i> Resubmit</button>
                    </div>
                </div>
            </div>
        </div>
   
        <script>
            // Add event listeners to approve/reject buttons
            document.querySelectorAll('.btn-approve').forEach(btn => {
                btn.addEventListener('click', function() {
                    alert('Document approved successfully! (This is a prototype)');
                });
            });

            document.querySelectorAll('.btn-reject').forEach(btn => {
                btn.addEventListener('click', function() {
                    alert('Please provide a rejection reason. (This is a prototype)');
                });
            });

            function approveWithComment() {
                alert('Document approved with comments! (This is a prototype)');
            }

            function rejectWithComment() {
                alert('Document rejected with comments! (This is a prototype)');
            }
        </script>
    @endsection
