 @extends('layouts.app')

    @section('title', 'Flow configuration')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/flow-configuration.css') }}">
    @endpush

    <!-- Main Content -->
 
    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-gear"></i> Flow Configuration</h1>
        <p>Create and manage document approval workflows.</p>
    </div>

    <!-- Existing Flows -->
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0;"><i class="bi bi-diagram-3"></i> Configured Approval Flows</h5>
                <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#createFlowModal"><i class="bi bi-plus-circle"></i> Create New Flow</button>
            </div>
        </div>
        <div class="card-body">
            <!-- Flow 1 -->
            <div class="flow-card">
                <div class="flow-header">
                    <div>
                        <div class="flow-title"><i class="bi bi-diagram-3"></i> Standard Approval Flow</div>
                        <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For general documents</div>
                    </div>
                    <div>
                        <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                    </div>
                </div>
                <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                    <div class="flow-step">
                        <div class="flow-step-icon">1</div>
                        <div>
                            <strong>Initial Submission</strong> - Document uploaded by user
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">2</div>
                        <div>
                            <strong>Department Head Review</strong> - Finance Department Head approval
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">3</div>
                        <div>
                            <strong>Final Approval</strong> - Executive Director approval
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                    <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                </div>
            </div>

            <!-- Flow 2 -->
            <div class="flow-card">
                <div class="flow-header">
                    <div>
                        <div class="flow-title"><i class="bi bi-diagram-3"></i> Financial Review Flow</div>
                        <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For financial documents and budgets</div>
                    </div>
                    <div>
                        <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                    </div>
                </div>
                <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                    <div class="flow-step">
                        <div class="flow-step-icon">1</div>
                        <div>
                            <strong>Initial Submission</strong> - Document uploaded by user
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">2</div>
                        <div>
                            <strong>Finance Manager Review</strong> - Finance Manager approval
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">3</div>
                        <div>
                            <strong>CFO Approval</strong> - Chief Financial Officer approval
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">4</div>
                        <div>
                            <strong>Executive Sign-off</strong> - CEO final approval
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                    <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                </div>
            </div>

            <!-- Flow 3 -->
            <div class="flow-card">
                <div class="flow-header">
                    <div>
                        <div class="flow-title"><i class="bi bi-diagram-3"></i> Compliance Review Flow</div>
                        <div style="font-size: 13px; color: #6c757d; margin-top: 5px;">For compliance and audit documents</div>
                    </div>
                    <div>
                        <span class="flow-status"><i class="bi bi-check-circle"></i> Active</span>
                    </div>
                </div>
                <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 6px;">
                    <div class="flow-step">
                        <div class="flow-step-icon">1</div>
                        <div>
                            <strong>Initial Submission</strong> - Document uploaded by user
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">2</div>
                        <div>
                            <strong>Compliance Officer Review</strong> - Compliance Officer approval
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">3</div>
                        <div>
                            <strong>Legal Review</strong> - Legal Department approval
                        </div>
                    </div>
                    <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                    <div class="flow-step">
                        <div class="flow-step-icon">4</div>
                        <div>
                            <strong>Final Approval</strong> - Executive Director approval
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button class="btn-small"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn-small"><i class="bi bi-eye"></i> View Details</button>
                    <button class="btn-small-danger"><i class="bi bi-trash"></i> Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Flow Modal -->
    <div class="modal fade" id="createFlowModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Create New Approval Flow</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createFlowForm">
                        <div class="mb-3">
                            <label for="flowName" class="form-label">Flow Name <span style="color: #dc3545;">*</span></label>
                            <input type="text" class="form-control" id="flowName" placeholder="e.g., HR Review Flow" required>
                        </div>

                        <div class="mb-3">
                            <label for="flowDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="flowDescription" rows="3" placeholder="Describe the purpose of this flow"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="docType" class="form-label">Document Type <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="docType" required>
                                <option value="">Select Document Type</option>
                                <option value="financial">Financial</option>
                                <option value="project">Project</option>
                                <option value="hr">HR</option>
                                <option value="compliance">Compliance</option>
                                <option value="budget">Budget</option>
                                <option value="policy">Policy</option>
                            </select>
                        </div>

                        <h6 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Approval Steps</h6>

                        <div class="mb-3">
                            <label for="step1User" class="form-label">Step 1 - First Approver <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="step1User" required>
                                <option value="">Select User/Role</option>
                                <option value="dept-head">Department Head</option>
                                <option value="manager">Manager</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="step2User" class="form-label">Step 2 - Second Approver</label>
                            <select class="form-control" id="step2User">
                                <option value="">Select User/Role (Optional)</option>
                                <option value="director">Director</option>
                                <option value="cfo">CFO</option>
                                <option value="ceo">CEO</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="step3User" class="form-label">Step 3 - Final Approver</label>
                            <select class="form-control" id="step3User">
                                <option value="">Select User/Role (Optional)</option>
                                <option value="executive">Executive Director</option>
                                <option value="ceo">CEO</option>
                                <option value="board">Board Member</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" id="requireComment">
                                <span>Require comments at each approval step</span>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" id="allowReject" checked>
                                <span>Allow rejection with comments</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createFlow()"><i class="bi bi-check"></i> Create Flow</button>
                </div>
            </div>
        </div>
    </div>

   
    <script>
        function createFlow() {
            alert('Flow created successfully! (This is a prototype)');
            document.getElementById('createFlowForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('createFlowModal'));
            modal.hide();
        }
    </script>
    @endsection
