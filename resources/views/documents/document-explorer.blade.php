@extends('layouts.app')

    @section('title', 'Document Explorer')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/document-explorer.css') }}">
    @endpush

    <!-- Main Content -->

        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-folder"></i> Document Explorer</h1>
            <p>Browse documents organized by category folders.</p>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <a href="#"><i class="bi bi-house"></i> Home</a>
            <span>/</span>
            <a href="#" id="currentFolder">Financial Documents</a>
        </div>

        <!-- Explorer Container -->
        <div class="explorer-container">
            <!-- Folder Tree -->
            <div class="folder-tree">
                <h6><i class="bi bi-folder-fill"></i> Categories</h6>
                <ul class="folder-list">
                    <li class="folder-item active" onclick="selectFolder(this, 'Financial')">
                        <i class="bi bi-folder-fill"></i> Financial
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'HR')">
                        <i class="bi bi-folder-fill"></i> HR & Payroll
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Projects')">
                        <i class="bi bi-folder-fill"></i> Projects
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Compliance')">
                        <i class="bi bi-folder-fill"></i> Compliance
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Policies')">
                        <i class="bi bi-folder-fill"></i> Policies
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Contracts')">
                        <i class="bi bi-folder-fill"></i> Contracts
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Reports')">
                        <i class="bi bi-folder-fill"></i> Reports
                    </li>
                    <li class="folder-item" onclick="selectFolder(this, 'Archived')">
                        <i class="bi bi-folder-fill"></i> Archived
                    </li>
                </ul>
            </div>

            <!-- File View -->
            <div class="file-view">
                <!-- View Controls -->
                <div class="view-controls">
                    <div>
                        <h6 style="margin: 0; color: #212529; font-weight: 600;">Financial Documents (12 items)</h6>
                    </div>
                    <div class="view-buttons">
                        <button class="view-btn active" onclick="switchView('grid', this)"><i class="bi bi-grid-3x3-gap"></i> Grid</button>
                        <button class="view-btn" onclick="switchView('list', this)"><i class="bi bi-list-ul"></i> List</button>
                    </div>
                </div>

                <!-- Grid View -->
                <div class="document-grid" id="gridView">
                    <div class="document-item" onclick="openDocument('Budget 2025')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Budget 2025</div>
                        <div class="document-meta">v2.1 • 2.5 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Q4 Financial Report')">
                        <div class="document-icon"><i class="bi bi-file-earmark-excel"></i></div>
                        <div class="document-name">Q4 Financial Report</div>
                        <div class="document-meta">v1.0 • 1.8 MB</div>
                        <span class="document-status status-pending">Pending</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Expense Claims')">
                        <div class="document-icon"><i class="bi bi-file-earmark-word"></i></div>
                        <div class="document-name">Expense Claims</div>
                        <div class="document-meta">v3.0 • 0.9 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Invoice Template')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Invoice Template</div>
                        <div class="document-meta">v1.5 • 0.4 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Tax Compliance')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Tax Compliance</div>
                        <div class="document-meta">v2.0 • 1.2 MB</div>
                        <span class="document-status status-pending">Pending</span>
                    </div>

                    <div class="document-item" onclick="openDocument('Audit Report')">
                        <div class="document-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                        <div class="document-name">Audit Report</div>
                        <div class="document-meta">v1.0 • 3.2 MB</div>
                        <span class="document-status status-approved">Approved</span>
                    </div>
                </div>

                <!-- List View -->
                <div class="document-list" id="listView">
                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Budget 2025')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Budget 2025</span>
                        </div>
                        <div class="doc-modified">2024-11-28</div>
                        <div class="doc-size">2.5 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Budget 2025')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Q4 Financial Report')">
                            <i class="bi bi-file-earmark-excel doc-icon"></i>
                            <span>Q4 Financial Report</span>
                        </div>
                        <div class="doc-modified">2024-11-25</div>
                        <div class="doc-size">1.8 MB</div>
                        <div><span class="document-status status-pending">Pending</span></div>
                        <button class="btn-small" onclick="openDocument('Q4 Financial Report')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Expense Claims')">
                            <i class="bi bi-file-earmark-word doc-icon"></i>
                            <span>Expense Claims</span>
                        </div>
                        <div class="doc-modified">2024-11-20</div>
                        <div class="doc-size">0.9 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Expense Claims')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Invoice Template')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Invoice Template</span>
                        </div>
                        <div class="doc-modified">2024-11-15</div>
                        <div class="doc-size">0.4 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Invoice Template')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Tax Compliance')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Tax Compliance</span>
                        </div>
                        <div class="doc-modified">2024-11-10</div>
                        <div class="doc-size">1.2 MB</div>
                        <div><span class="document-status status-pending">Pending</span></div>
                        <button class="btn-small" onclick="openDocument('Tax Compliance')">View</button>
                    </div>

                    <div class="document-row">
                        <input type="checkbox" class="doc-checkbox">
                        <div class="doc-name-cell" onclick="openDocument('Audit Report')">
                            <i class="bi bi-file-earmark-pdf doc-icon"></i>
                            <span>Audit Report</span>
                        </div>
                        <div class="doc-modified">2024-11-05</div>
                        <div class="doc-size">3.2 MB</div>
                        <div><span class="document-status status-approved">Approved</span></div>
                        <button class="btn-small" onclick="openDocument('Audit Report')">View</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function selectFolder(element, folderName) {
                document.querySelectorAll('.folder-item').forEach(item => {
                    item.classList.remove('active');
                });
                element.classList.add('active');
                document.getElementById('currentFolder').textContent = folderName + ' Documents';
            }

            function switchView(viewType, button) {
                document.querySelectorAll('.view-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');

                const gridView = document.getElementById('gridView');
                const listView = document.getElementById('listView');

                if (viewType === 'grid') {
                    gridView.classList.remove('active');
                    gridView.style.display = 'grid';
                    listView.classList.remove('active');
                    listView.style.display = 'none';
                } else {
                    gridView.style.display = 'none';
                    listView.classList.add('active');
                    listView.style.display = 'block';
                }
            }

            function openDocument(docName) {
                // window.location.href = 'document-view.html?doc=' + encodeURIComponent(docName);
                window.location.href = "{{route('document-view')}}" + "?doc=" + encodeURIComponent(docName);
            }
        </script>
    @endsection
