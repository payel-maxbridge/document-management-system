
    @extends('layouts.app')

    @section('title', 'Documents')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/document.css') }}">
    @endpush

        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-file-earmark"></i> Documents</h1>
            <p>Browse and manage all documents in the system.</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <h6 style="margin-bottom: 15px; font-weight: 600;"><i class="bi bi-funnel"></i> Filters</h6>
            <div class="filter-group">
                <div class="filter-item">
                    <label for="search-title">Search by Title</label>
                    <input type="text" id="search-title" placeholder="Enter document title...">
                </div>
                <div class="filter-item">
                    <label for="filter-tags">Filter by Tags</label>
                    <select id="filter-tags">
                        <option value="">All Tags</option>
                        <option value="financial">Financial</option>
                        <option value="project">Project</option>
                        <option value="hr">HR</option>
                        <option value="compliance">Compliance</option>
                        <option value="budget">Budget</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label for="filter-date">Filter by Date</label>
                    <input type="date" id="filter-date">
                </div>
                <div class="filter-item">
                    <label for="filter-status">Filter by Status</label>
                    <select id="filter-status">
                        <option value="">All Status</option>
                        <option value="approved">Approved</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-item">
                    <button class="btn-primary" style="width: 100%;"><i class="bi bi-search"></i> Search</button>
                </div>
            </div>
        </div>

        <!-- Documents List -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="margin: 0;"><i class="bi bi-list"></i> All Documents (24)</h5>
                    <a href="upload.html" class="btn-primary"><i class="bi bi-cloud-upload"></i> Upload New</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Document 1 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> Q4 Financial Report 2024</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: John Doe | 
                                <i class="bi bi-calendar"></i> Dec 1, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (2.5 MB)
                            </div>
                            <div class="document-meta">Description: Quarterly financial performance analysis and projections</div>
                            <div class="document-tags">
                                <span class="tag">Financial</span>
                                <span class="tag">Q4</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="document-card pending-approval">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-word"></i> Project Proposal - Website Redesign</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Sarah Smith | 
                                <i class="bi bi-calendar"></i> Nov 29, 2024 | 
                                <i class="bi bi-file-type-word"></i> DOCX (1.8 MB)
                            </div>
                            <div class="document-meta">Description: Comprehensive website redesign proposal with mockups and timeline</div>
                            <div class="document-tags">
                                <span class="tag">Project</span>
                                <span class="tag">Design</span>
                                <span class="tag">Web</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 3 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> Annual Compliance Audit Report</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Mike Johnson | 
                                <i class="bi bi-calendar"></i> Nov 26, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (3.2 MB)
                            </div>
                            <div class="document-meta">Description: Complete compliance audit findings and recommendations</div>
                            <div class="document-tags">
                                <span class="tag">Compliance</span>
                                <span class="tag">Audit</span>
                                <span class="tag">Annual</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 4 -->
                <div class="document-card rejected">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-excel"></i> Budget Allocation 2025 - Draft</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Alex Kumar | 
                                <i class="bi bi-calendar"></i> Nov 24, 2024 | 
                                <i class="bi bi-file-type-excel"></i> XLSX (0.8 MB)
                            </div>
                            <div class="document-meta">Description: Initial budget allocation proposal (rejected - requires revision)</div>
                            <div class="document-tags">
                                <span class="tag">Budget</span>
                                <span class="tag">2025</span>
                                <span class="tag">Finance</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-rejected"><i class="bi bi-x-circle"></i> Rejected</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 5 -->
                <div class="document-card approved">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-word"></i> HR Policy Update - Remote Work</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: Emma Wilson | 
                                <i class="bi bi-calendar"></i> Nov 22, 2024 | 
                                <i class="bi bi-file-type-word"></i> DOCX (1.2 MB)
                            </div>
                            <div class="document-meta">Description: Updated remote work policy guidelines and procedures</div>
                            <div class="document-tags">
                                <span class="tag">HR</span>
                                <span class="tag">Policy</span>
                                <span class="tag">Remote Work</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-approved"><i class="bi bi-check-circle"></i> Approved</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document 6 -->
                <div class="document-card pending-approval">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="document-title"><i class="bi bi-file-pdf"></i> IT Infrastructure Upgrade Plan</div>
                            <div class="document-meta">
                                <i class="bi bi-person"></i> Uploaded by: David Brown | 
                                <i class="bi bi-calendar"></i> Nov 20, 2024 | 
                                <i class="bi bi-file-type-pdf"></i> PDF (2.1 MB)
                            </div>
                            <div class="document-meta">Description: Comprehensive IT infrastructure upgrade roadmap and budget</div>
                            <div class="document-tags">
                                <span class="tag">IT</span>
                                <span class="tag">Infrastructure</span>
                                <span class="tag">Upgrade</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span class="status-badge status-amber"><i class="bi bi-hourglass-split"></i> Pending</span>
                            <div style="margin-top: 10px;">
                                <button class="btn-outline"><i class="bi bi-download"></i> Download</button>
                                <button class="btn-outline"><i class="bi bi-eye"></i> View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <button class="btn-secondary"><i class="bi bi-chevron-left"></i> Previous</button>
            <button class="btn-primary">1</button>
            <button class="btn-secondary">2</button>
            <button class="btn-secondary">3</button>
            <button class="btn-secondary"><i class="bi bi-chevron-right"></i> Next</button>
        </div>
    <!-- </div> -->

@endsection