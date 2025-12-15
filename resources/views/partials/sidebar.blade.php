<div class="sidebar">
    <div class="logo">
        <h5><i class="bi bi-file-earmark-text"></i> DMS</h5>
            <p>Document Management</p>
    </div>

        <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('documents')}}" class="{{ request()->routeIs('documents') ? 'active' : ''}}">
            <i class="bi bi-cloud-upload"></i> Documents</a>
        </li>
        <li><a href="{{ route('uploadDocument')}}" class="{{ request()->routeIs('uploadDocument') ? 'active' : ''}}">
            <i class="bi bi-cloud-upload"></i> Upload Document</a>
        </li>
        <li><a href="{{ route('approvals')}}" class="{{ request()->routeIs('approvals') ? 'active' : ''}}">
            <i class="bi bi-check-circle"></i> Approvals</a>
        </li>
        <li><a href="{{ route('user-hierarchy')}}" class="{{ request()->routeIs('user-hierarchy') ? 'active' : ''}}">
            <i class="bi bi-diagram-3"></i> User Hierarchy</a>
        </li>
        <li><a href="{{ route('flow-configuration')}}" class="{{ request()->routeIs('flow-configuration') ? 'active' : ''}}">
            <i class="bi bi-gear"></i> Flow Configuration</a>
        </li>
        <li><a href="{{ route('permissions')}}" class="{{ request()->routeIs('permissions') ? 'active' : ''}}">
            <i class="bi bi-shield-lock"></i> Permissions</a>
        </li>
        <li><a href="{{ route('configuration')}}" class="{{ request()->routeIs('configuration') ? 'active' : ''}}">
            <i class="bi bi-sliders"></i> Configuration</a>
        </li>
        <li><a href="{{ route('document-explorer')}}" class="{{ request()->routeIs('document-explorer') ? 'active' : ''}}">
            <i class="bi bi-folder"></i> Document Explorer</a>
        </li>
        <li><a href="{{ route('audit-trail')}}" class="{{ request()->routeIs('audit-trail') ? 'active' : ''}}">
            <i class="bi bi-clock-history"></i> Audit Trail</a>
        </li>
        <li><a href="{{ route('document-lifecycle')}}" class="{{ request()->routeIs('document-lifecycle') ? 'active' : ''}}">
            <i class="bi bi-diagram-2"></i> Document Lifecycle</a>
        </li>
        <li><a href="{{ route('logout') }}" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
            <i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
        
    </ul>
</div>