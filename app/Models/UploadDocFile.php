<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadDocFile extends Model
{
    //
    use SoftDeletes;

    public $fillable = ['user_id', 'upload_doc_id', 'doc_type', 'doc_tags', 'file_path', 'file_type'];

     protected $casts = [
        'doc_tags' => 'array',
    ];

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function uploadDoc() {
       return $this->belongsTo(UploadDocument::class);
    }
}
