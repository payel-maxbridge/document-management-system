<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileConfiguration extends Model
{
    //
    public static function fileType() {
        return [
            ['id'   => 'pdf',           
            'label' => 'PDF',
            'icon'  => 'bi bi-file-pdf',
            'description' => 'Portable Document Format',
            'is_active'=> 'true'],

            ['id'   => 'docx',           
            'label' => 'DOCX',
            'icon'  => 'bi bi-file-word',
            'description' => 'Microsoft Word Document',
            'is_active'=> 'true'],

            ['id'   => 'xlsx',           
            'label' => 'XLSX',
            'icon'  => 'bi bi-file-excel',
            'description' => 'Microsoft Excel Spreadsheet',
            'is_active'=> 'true'],

            ['id'   => 'pptx',           
            'label' => 'PPTX',
            'icon'  => 'bi bi-file-ppt',
            'description' => 'Microsoft PowerPoint Presentation',
            'is_active'=> 'true'],

            ['id'   => 'txt',           
            'label' => 'TXT',
            'icon'  => 'bi bi-file-text',
            'description' => 'Plain Text File',
            'is_active'=> 'true'],

             ['id'   => 'jpg',           
            'label' => 'JPG/PNG',
            'icon'  => 'bi bi-file-image',
            'description' => 'Image Files',
            'is_active'=> 'true'],

             ['id'   => 'zip',           
            'label' => 'ZIP',
            'icon'  => 'bi bi-file-zip',
            'description' => 'Compressed Archive',
            'is_active'=> 'true']
        ];
    }
}
