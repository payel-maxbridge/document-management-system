 @extends('layouts.app')

    @section('title', 'Permission')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/permission.css') }}">
    @endpush

    <!-- Main Content -->
        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="bi bi-shield-lock"></i> Permissions</h1>
            <p>Manage user roles and permissions for document operations.</p>
        </div>

        <!-- Permission Matrix -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-table"></i> Permission Matrix by Role</h5>
            </div>
            <div class="card-body">
                <div class="permission-matrix">
                    <table class="permission-table">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Document Upload</th>
                                <th>Document View</th>
                                <th>Document Approve/Reject</th>
                                <th>Create User</th>
                                <th>Manage Flows</th>
                                <th>System Configuration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="role-name"><i class="bi bi-shield-lock"></i> Administrator</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person-badge"></i> Department Head</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person-check"></i> Approver</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-person"></i> Regular User</td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                            <tr>
                                <td class="role-name"><i class="bi bi-eye"></i> Viewer</td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-allowed"><i class="bi bi-check"></i> Yes</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                                <td class="permission-cell"><span class="permission-badge permission-denied"><i class="bi bi-x"></i> No</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Editable Permissions -->
        <div class="card">
            <div class="card-header">
                <h5 style="margin: 0;"><i class="bi bi-pencil-square"></i> Customize Role Permissions</h5>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 20px;">
                    <label for="roleSelect" style="font-weight: 600; margin-bottom: 10px; display: block;">Select Role to Customize</label>
                    <select id="roleSelect" style="padding: 10px 15px; border: 1px solid #dee2e6; border-radius: 6px; width: 100%; max-width: 300px;">
                        <option value="">Select a role</option>
                        <option value="admin">Administrator</option>
                        <option value="dept-head">Department Head</option>
                        <option value="approver">Approver</option>
                        <option value="user">Regular User</option>
                        <option value="viewer">Viewer</option>
                    </select>
                </div>

                <div id="permissionsList" style="display: none;">
                    <h6 style="margin-bottom: 15px; font-weight: 600;">Permissions for Selected Role</h6>
                    
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm1" checked>
                            <label for="perm1" style="margin: 0; cursor: pointer;">
                                <strong>Document Upload</strong> - Allow users to upload new documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm2" checked>
                            <label for="perm2" style="margin: 0; cursor: pointer;">
                                <strong>Document View</strong> - Allow users to view documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm3">
                            <label for="perm3" style="margin: 0; cursor: pointer;">
                                <strong>Document Approve/Reject</strong> - Allow users to approve or reject documents
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm4">
                            <label for="perm4" style="margin: 0; cursor: pointer;">
                                <strong>Create User</strong> - Allow users to create new user accounts
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm5">
                            <label for="perm5" style="margin: 0; cursor: pointer;">
                                <strong>Manage Flows</strong> - Allow users to create and manage approval flows
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="perm6">
                            <label for="perm6" style="margin: 0; cursor: pointer;">
                                <strong>System Configuration</strong> - Allow users to configure system settings
                            </label>
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-primary" onclick="savePermissions()"><i class="bi bi-check"></i> Save Changes</button>
                        <button class="btn-secondary" onclick="resetPermissions()"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    </div>
                </div>
            </div>
        </div>
   
        <script>
            document.getElementById('roleSelect').addEventListener('change', function() {
                if (this.value) {
                    document.getElementById('permissionsList').style.display = 'block';
                } else {
                    document.getElementById('permissionsList').style.display = 'none';
                }
            });

            function savePermissions() {
                alert('Permissions updated successfully! (This is a prototype)');
            }

            function resetPermissions() {
                document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                    cb.checked = false;
                });
            }
        </script>
    @endsection
