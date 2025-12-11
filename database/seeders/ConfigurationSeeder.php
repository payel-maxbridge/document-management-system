<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Configuration::create ([
            'max_file_size'     => 50,
            'max_total_size'    => 500,
            'max_no_files'      => 50,
            'virus_scanning'    => true,
            'allowed_file_type' => ['pdf', 'docx', 'xlsx', 'pptx', 'txt', 'jpg', 'png', 'zip'],
            'app_name'          => 'Document Management System',
            'support_email'     => 'support@example.com',
            'email_notification'    => true,
            'document_versioning'   => true,
            'retention_days'    => 365,
        ]);

    }
}
