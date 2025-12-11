<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    public $fillable = [
        'max_file_size', 'max_total_size', 'max_no_files', 'virus_scanning', 'allowed_file_type', 'app_name', 'support_email',
        'email_notification', 'document_versioning', 'retention_days'
    ];

    protected $casts =[
        'allowed_file_type'     => 'array',
        'virus_scanning'        => 'boolean',
        'email_notification'    => 'boolean',
        'document_versioning'   => 'boolean',
    ];
}
