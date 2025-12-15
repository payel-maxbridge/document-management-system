   @extends('layouts.app')

    @section('title', 'Configuration')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/configuration.css') }}">
    @endpush

    <!-- Main Content -->

    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-sliders"></i> Configuration</h1>
        <p>Configure system settings and file upload restrictions.</p>
    </div>

    <!-- File Upload Settings -->
    <div class="card">
        <div class="card-header">
            <h5 style="margin: 0;"><i class="bi bi-cloud-upload"></i> File Upload Settings</h5>
        </div>
        <div class="card-body">
            <form id="uploadSettingsForm" method="post" action="{{ route('configuration.upload.save')}}">
                @csrf
                <div class="form-group">
                    <label for="maxFileSize" class="form-label">Maximum File Size (MB) <span style="color: #dc3545;">*</span></label>
                    <input type="number" name="max_file_size" class="form-control" id="maxFileSize" value="{{ $data->max_file_size }}" min="1" max="1000">
                    <span class="form-text">Maximum size for a single file upload</span>
                </div>

                <div class="form-group">
                    <label for="maxTotalSize" class="form-label">Maximum Total Size per Document (MB) <span style="color: #dc3545;">*</span></label>
                    <input type="number" class="form-control" name="max_total_size" id="maxTotalSize" value="{{ $data->max_total_size}}" min="1" max="5000">
                    <span class="form-text">Maximum total size for all files in a single document upload</span>
                </div>

                <div class="form-group">
                    <label for="maxFiles" class="form-label">Maximum Number of Files per Document <span style="color: #dc3545;">*</span></label>
                    <input type="number" name="max_no_files" class="form-control" id="maxFiles" value="{{$data->max_no_files}}" min="1" max="100">
                    <span class="form-text">Maximum number of files that can be uploaded in a single document</span>
                </div>

                <div class="form-group">
                    <label class="form-label">Virus Scanning <span style="color: #dc3545;">*</span></label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="toggle-switch">
                            <!-- <input type="checkbox" checked> -->
                            <input type="checkbox" name="virus_scanning" {{ $data->virus_scanning ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        <span>Enable virus scanning for uploaded files</span>
                    </div>
                    <span class="form-text">Automatically scan files for malware and viruses</span>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" id="uploadSaveBtn" class="btn-primary">
                        <span class="normal-text"><i class="bi bi-check"></i> Save Settings</span>
                        <span class="loader" style="display:none;">
                            <span class="spinner-border spinner-border-sm"></span> Saving...
                        </span>
                    </button>
                    <button type="reset" class="btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Allowed File Types -->
    <div class="card">
        <div class="card-header">
            <h5 style="margin: 0;"><i class="bi bi-file-type-pdf"></i> Allowed File Types</h5>
        </div>

        <div class="card-body">
            @foreach($fileType as $file)
                <div class="file-type-item">
                    <div class="file-type-item-info">
                        <div class="file-type-icon"><i class="{{ $file['icon'] }}"></i></div>
                        <div class="file-type-details">
                            <h6>{{ $file['label'] }}</h6>
                            <p>{{ $file['description'] ?? '' }}</p>
                        </div>
                    </div>

                    <label class="toggle-switch">
                        <input type="checkbox" class="file-checkbox"
                            value="{{ $file['id'] }}"
                            {{ in_array($file['id'], $data->allowed_file_type ?? []) ? 'checked' : '' }}>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            @endforeach

            <div class="mt-4">
                <button class="btn btn-primary" onclick="saveFileTypes(this)">
                    <span class="btn-text"><i class="bi bi-check"></i> Save File Types</span>
                    <span class="loader d-none ms-2"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...</span>
                </button>
            </div>
        </div>
    </div>


    <!-- System Settings -->
    <div class="card">
        <div class="card-header">
            <h5 style="margin: 0;"><i class="bi bi-gear"></i> System Settings</h5>
        </div>
        <div class="card-body">
            <form id="systemSettingsForm" method="post" action="{{ route('configuration.system.save')}}">
                @csrf
                <div class="form-group">
                    <label for="appName" class="form-label">Application Name</label>
                    <input type="text" class="form-control" name="app_name" id="appName" value="{{$data->app_name}}">
                </div>

                <div class="form-group">
                    <label for="appVersion" class="form-label">System Version</label>
                    <input type="text" class="form-control" id="appVersion" value="1.0.0" disabled>
                </div>

                <div class="form-group">
                    <label for="supportEmail" class="form-label">Support Email</label>
                    <input type="email" class="form-control" name="support_email" id="supportEmail" value="{{$data->support_email}}">
                </div>

                <div class="form-group">
                    <label class="form-label">Email Notifications <span style="color: #dc3545;">*</span></label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="toggle-switch">
                             <input type="checkbox" name="email_notification" {{ $data->email_notification ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        <span>Send email notifications for document approvals and updates</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Document Versioning <span style="color: #dc3545;">*</span></label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="toggle-switch">
                            <input type="checkbox" name="document_versioning" {{ $data->document_versioning ? 'checked' : ''}}>
                            <span class="toggle-slider"></span>
                        </label>
                        <span>Keep version history for all documents</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="retentionDays" class="form-label">Document Retention Period (Days)</label>
                    <input type="number" name="retention_days" class="form-control" id="retentionDays" value="{{$data->retention_days}}" min="30" max="365">
                    <span class="form-text">Number of days to retain archived documents</span>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" id="systemSavebtn" class="btn-primary">
                        <span class="normal-text"><i class="bi bi-check"></i> Save Settings</span>
                        <span class="loader" style="display:none;">
                        <span class="spinner-border spinner-border-sm"></span> Saving...
                    </button>
                    <button type="reset" class="btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>

    
    @push('scripts')
    <script>
        $(document).ready(function(){
            $('#uploadSettingsForm').on('submit', function(e){
                // console.log('hi');
                e.preventDefault();

                let btn = $('#uploadSaveBtn');

                //show loader + disable button
                btn.prop('disabled', true);
                btn.find('.normal-text').hide();
                btn.find('.loader').show();

                $.ajax({
                    url: "{{route('configuration.upload.save')}}",
                    type: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" //security
                    },
                    success: function(response){
                        toastr.success("Upload setting saved successfully");
                    },
                    error: function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value){
                                toastr.error(value);
                            });
                        }else{
                            toastr.error("Something went wrong, please try again");
                        }
                    },
                    complete: function(){
                        // HIDE LOADER + ENABLE BUTTON BACK
                        btn.prop('disabled', false);
                        btn.find('.loader').hide();
                        btn.find('.normal-text').show();
                    }
                });
            });


            $('#systemSettingsForm').on('submit', function(e){
                // console.log('hi');
                e.preventDefault();

                let btn = $('#systemSavebtn');

                btn.prop('disabled', true);
                btn.find('.normal-text').hide();
                btn.find('.loader').show();
                $.ajax({
                    url: "{{route('configuration.system.save')}}",
                    type: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response){
                        toastr.success("System setting saved successfully");
                    },
                    error: function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value){
                                toastr.error(value);
                            });
                        }else{
                            toastr.error("Something went wrong, please try again");
                        }
                    },
                    complete: function(){
                        // HIDE LOADER + ENABLE BUTTON BACK
                        btn.prop('disabled', false);
                        btn.find('.loader').hide();
                        btn.find('.normal-text').show();
                    }
                });
            });
           
        });
        function saveFileTypes(button) {
            // Disable button + show loader
            $(button).prop('disabled', true);
            $(button).find('.btn-text').addClass('d-none');
            $(button).find('.loader').removeClass('d-none');

            let selected = [];
            $('.file-checkbox:checked').each(function(){
                selected.push($(this).val());
            });

            $.ajax({
                url: "{{ route('configuration.file.save') }}",
                type: "POST",
                data: {
                    allowed_file_type: selected
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(){
                    toastr.success("File types saved successfully");
                    // Restore button
                    $(button).prop('disabled', false);
                    $(button).find('.btn-text').removeClass('d-none');
                    $(button).find('.loader').addClass('d-none');
                },
                error: function(){
                    toastr.error("Something went wrong, please try again");
                    $(button).prop('disabled', false);
                    $(button).find('.btn-text').removeClass('d-none');
                    $(button).find('.loader').addClass('d-none');
                }
            });
        }

    </script>
    @endpush
@endsection
