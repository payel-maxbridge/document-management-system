<?php

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

?>