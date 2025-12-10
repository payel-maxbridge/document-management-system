 @extends('layouts.app')

    @section('title', 'User Hierarchy')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/user-hierarchy.css') }}">
    @endpush

    <!-- Main Content -->
   
    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-diagram-3"></i> User Hierarchy</h1>
        <p>Manage organizational structure and user roles.</p>
    </div>

    <!-- User Hierarchy -->
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Organization Structure</h5>
                <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-person-plus"></i> Add User</button>
            </div>
        </div>
        <div class="card-body">
            <!-- CEO Level -->
            <div class="hierarchy-tree">
                <h6 style="margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 1 - Executive</h6>
                <div class="hierarchy-item">
                    <div class="hierarchy-item-info">
                        <div class="hierarchy-item-avatar">AD</div>
                        <div class="hierarchy-item-details">
                            <h6>Admin Director</h6>
                            <p>Role: System Administrator | Department: Executive</p>
                        </div>
                    </div>
                    <div class="hierarchy-item-actions">
                        <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                        <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                    </div>
                </div>

                <!-- Department Heads -->
                <h6 style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 2 - Department Heads</h6>
                
                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">JD</div>
                            <div class="hierarchy-item-details">
                                <h6>John Doe</h6>
                                <p>Role: Department Head | Department: Finance</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">SS</div>
                            <div class="hierarchy-item-details">
                                <h6>Sarah Smith</h6>
                                <p>Role: Department Head | Department: HR</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">MJ</div>
                            <div class="hierarchy-item-details">
                                <h6>Mike Johnson</h6>
                                <p>Role: Department Head | Department: Operations</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Team Members -->
                <h6 style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; color: #0d6efd;"><i class="bi bi-diagram-3"></i> Level 3 - Team Members</h6>
                
                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">AK</div>
                            <div class="hierarchy-item-details">
                                <h6>Alex Kumar</h6>
                                <p>Role: Senior Analyst | Department: Finance | Reports to: John Doe</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">EW</div>
                            <div class="hierarchy-item-details">
                                <h6>Emma Wilson</h6>
                                <p>Role: HR Specialist | Department: HR | Reports to: Sarah Smith</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <div class="hierarchy-level">
                    <div class="hierarchy-item">
                        <div class="hierarchy-item-info">
                            <div class="hierarchy-item-avatar">DB</div>
                            <div class="hierarchy-item-details">
                                <h6>David Brown</h6>
                                <p>Role: Operations Manager | Department: Operations | Reports to: Mike Johnson</p>
                            </div>
                        </div>
                        <div class="hierarchy-item-actions">
                            <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn-small-danger"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-plus"></i> Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-control" id="userRole" required>
                                <option value="">Select Role</option>
                                <option value="admin">Administrator</option>
                                <option value="dept-head">Department Head</option>
                                <option value="approver">Approver</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userDept" class="form-label">Department</label>
                            <select class="form-control" id="userDept" required>
                                <option value="">Select Department</option>
                                <option value="finance">Finance</option>
                                <option value="hr">HR</option>
                                <option value="operations">Operations</option>
                                <option value="it">IT</option>
                                <option value="marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userReportsTo" class="form-label">Reports To</label>
                            <select class="form-control" id="userReportsTo">
                                <option value="">Select Supervisor</option>
                                <option value="admin">Admin Director</option>
                                <option value="john">John Doe (Finance)</option>
                                <option value="sarah">Sarah Smith (HR)</option>
                                <option value="mike">Mike Johnson (Operations)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addUser()"><i class="bi bi-check"></i> Add User</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addUser() {
            alert('User added successfully! (This is a prototype)');
            document.getElementById('addUserForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }
    </script>
    @endsection
