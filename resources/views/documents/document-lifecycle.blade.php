@extends('layouts.app')

    @section('title', 'Document Lifecycle')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/document-lifecycle.css') }}">
    @endpush

    <!-- Main Content -->
      
        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-diagram-2"></i> Document Lifecycle</h1>
            <p>Track document status through the approval workflow.</p>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-file-earmark"></i> Budget 2025 - Workflow Status</h5>
            </div>
            <div class="card-body">
                <!-- Workflow Steps -->
                <div class="workflow-container">
                    <div class="workflow-step completed">
                        <div class="step-circle"><i class="bi bi-check"></i></div>
                        <div class="step-label">Submitted</div>
                        <div class="step-status">Completed</div>
                    </div>

                    <div class="workflow-step completed">
                        <div class="step-circle"><i class="bi bi-check"></i></div>
                        <div class="step-label">Finance Review</div>
                        <div class="step-status">Completed</div>
                    </div>

                    <div class="workflow-step active">
                        <div class="step-circle"><i class="bi bi-hourglass-split"></i></div>
                        <div class="step-label">Department Head</div>
                        <div class="step-status">In Progress</div>
                    </div>

                    <div class="workflow-step">
                        <div class="step-circle"><i class="bi bi-person-check"></i></div>
                        <div class="step-label">Executive Review</div>
                        <div class="step-status">Pending</div>
                    </div>

                    <div class="workflow-step">
                        <div class="step-circle"><i class="bi bi-check-circle"></i></div>
                        <div class="step-label">Final Approval</div>
                        <div class="step-status">Pending</div>
                    </div>
                </div>

                <!-- Document Details -->
                <div class="document-details">
                    <div class="detail-row">
                        <div class="detail-item">
                            <div class="detail-label">Document Name</div>
                            <div class="detail-value">Budget 2025</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Current Version</div>
                            <div class="detail-value">v2.1</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Current Status</div>
                            <div class="detail-value"><span class="status-badge status-pending">Pending Approval</span></div>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-item">
                            <div class="detail-label">Submitted By</div>
                            <div class="detail-value">Sarah Smith</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Submitted Date</div>
                            <div class="detail-value">2024-10-15</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Category</div>
                            <div class="detail-value">Financial</div>
                        </div>
                    </div>
                </div>

                <!-- Approval History -->
                <div class="approval-history">
                    <h6><i class="bi bi-check-circle"></i> Approval History</h6>

                    <div class="approval-record">
                        <div class="approval-icon approved"><i class="bi bi-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Sarah Smith</div>
                            <div class="approval-role">Finance Officer - Submitted Document</div>
                            <div class="approval-comment">
                                <strong>Action:</strong> Document submitted for approval<br>
                                <strong>Comment:</strong> "Proposed budget allocation for fiscal year 2025 across all departments. Total budget: $2,500,000."
                            </div>
                        </div>
                        <div class="approval-time">2024-10-15<br>9:00 AM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon approved"><i class="bi bi-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Mike Johnson</div>
                            <div class="approval-role">Finance Manager - Approved</div>
                            <div class="approval-comment">
                                <strong>Action:</strong> Document approved and forwarded<br>
                                <strong>Comment:</strong> "Reviewed and approved. The budget looks good. Minor adjustments made to the IT department allocation."
                            </div>
                        </div>
                        <div class="approval-time">2024-11-15<br>3:20 PM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon pending"><i class="bi bi-hourglass-split"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">John Doe</div>
                            <div class="approval-role">Department Head - Pending Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Since:</strong> 2024-11-28 (1 day)<br>
                                <strong>Note:</strong> Document is in review. Expected response by 2024-12-05.
                            </div>
                        </div>
                        <div class="approval-time">2024-11-28<br>10:30 AM</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon"><i class="bi bi-person-check"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">Executive Director</div>
                            <div class="approval-role">Executive - Pending Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Note:</strong> Document will be forwarded after Department Head approval.
                            </div>
                        </div>
                        <div class="approval-time">Pending</div>
                    </div>

                    <div class="approval-record">
                        <div class="approval-icon"><i class="bi bi-check-circle"></i></div>
                        <div class="approval-content">
                            <div class="approval-user">CEO</div>
                            <div class="approval-role">CEO - Final Approval</div>
                            <div class="approval-comment">
                                <strong>Status:</strong> Awaiting approval<br>
                                <strong>Note:</strong> Document will be forwarded for final approval after all previous levels are approved.
                            </div>
                        </div>
                        <div class="approval-time">Pending</div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
