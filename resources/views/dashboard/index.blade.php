
    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush

        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
            <p>Welcome back! Here's your document management overview.</p>
        </div>

        <!-- Statistics Row -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="stat-label">Total Documents</div>
                    <div class="stat-number">24</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div class="stat-label">Pending Approvals</div>
                    <div class="stat-number">5</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                    <div class="stat-label">Approved</div>
                    <div class="stat-number">18</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
                    <div class="stat-label">Rejected</div>
                    <div class="stat-number">1</div>
                </div>
            </div>
        </div>

        <!-- Recently Uploaded Documents -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-cloud-upload"></i> Recently Uploaded Documents</h5>
            </div>
            <div class="card-body">
                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Q4 Financial Report 2024</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> Today at 10:30 AM
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-pdf"></i> PDF | 2.5 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Financial</span>
                                <span class="tag">Q4</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-recent"><i class="bi bi-check-circle"></i> New</span>
                        </div>
                    </div>
                </div>

                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Project Proposal - Website Redesign</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> 2 days ago
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-word"></i> DOCX | 1.8 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Project</span>
                                <span class="tag">Design</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </div>
                    </div>
                </div>

                <div class="document-card">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title">Annual Compliance Audit Report</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: You | 
                                <i class="bi bi-calendar"></i> 5 days ago
                            </div>
                            <div class="document-meta">
                                <i class="bi bi-file-type-pdf"></i> PDF | 3.2 MB
                            </div>
                            <div class="document-tags">
                                <span class="tag">Compliance</span>
                                <span class="tag">Audit</span>
                            </div>
                        </div>
                        <div>
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Approvals at Your Level -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-check-circle"></i> Pending Approvals at Your Level</h5>
                    </div>
                    <div class="card-body">
                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Budget Allocation 2025</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Sarah Smith | 
                                        <i class="bi bi-calendar"></i> 1 day ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Budget</span>
                                        <span class="tag">2025</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 1 day</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>

                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">HR Policy Update - Remote Work</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Mike Johnson | 
                                        <i class="bi bi-calendar"></i> 4 days ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">HR</span>
                                        <span class="tag">Policy</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 4 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>

                        <div class="document-card pending-approval">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">IT Infrastructure Upgrade Plan</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> From: Alex Kumar | 
                                        <i class="bi bi-calendar"></i> 8 days ago
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">IT</span>
                                        <span class="tag">Infrastructure</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-red"><i class="bi bi-exclamation-circle"></i> 8 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <button class="btn-success"><i class="bi bi-check"></i> Approve</button>
                                <button class="btn-danger"><i class="bi bi-x"></i> Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Pending at Lower Levels -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Documents Pending at Lower Levels (>3 days)</h5>
                    </div>
                    <div class="card-body">
                        <div class="document-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Vendor Contract - ABC Supplies</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> Pending with: Procurement Team | 
                                        <i class="bi bi-calendar"></i> 5 days
                                    </div>
                                    <div class="document-meta">
                                        <i class="bi bi-diagram-3"></i> Status: Awaiting Procurement Review
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Vendor</span>
                                        <span class="tag">Contract</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 5 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <button class="btn-secondary" style="font-size: 12px; padding: 8px 16px;"><i class="bi bi-bell"></i> Send Reminder</button>
                            </div>
                        </div>

                        <div class="document-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <div class="document-title">Training Program Proposal</div>
                                    <div class="document-meta">
                                        <i class="bi bi-person"></i> Pending with: HR Department | 
                                        <i class="bi bi-calendar"></i> 4 days
                                    </div>
                                    <div class="document-meta">
                                        <i class="bi bi-diagram-3"></i> Status: Under Review
                                    </div>
                                    <div class="document-tags">
                                        <span class="tag">Training</span>
                                        <span class="tag">HR</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> 4 days</span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <button class="btn-secondary" style="font-size: 12px; padding: 8px 16px;"><i class="bi bi-bell"></i> Send Reminder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
  
