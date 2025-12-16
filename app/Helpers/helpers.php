<?php
use Carbon\Carbon;

if (!function_exists('document_types')) {
    function document_types() {
        return [
            'Financial'   => 'financial',
            'Project'     => 'project',
            'HR'          => 'hr',
            'Compliance'  => 'compliance',
            'Budget'      => 'budget',
            'Policy'      => 'policy',
            'Report'      => 'report',
            'Contract'    => 'contract',
            'Other'       => 'other',
        ];
    }
}

if (!function_exists('approval_flows')) {
    function approval_flows() {
        return [
            'Standard Approval'  => 'standard',
            'Financial Review'   => 'financial',
            'Compliance Review'  => 'compliance',
            'HR Review'          => 'hr',
            'Executive Approval' => 'executive',
        ];
    }
}

if (!function_exists('upload_file')) {
    function upload_file($file, $folder = 'upload/uploadfiles')
    {
        $extension = $file->getClientOriginalExtension();
        $fileName  = time() . '_' . Str::random(10) . '.' . $extension;

        return $file->storeAs($folder, $fileName, 'public');
    }
}

?>