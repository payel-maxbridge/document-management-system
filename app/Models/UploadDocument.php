<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadDocument extends Model
{
    //
    public $table = "upload_documents";
    
    public $fillable = ['title', 'description', 'doc_type', 'tags', 'approval_flow', 'visibility', 'user_id'];

    protected $casts = [
        'tags' => 'array',
        // 'files' => 'array'
    ];

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function uploadDocFiles() {
        return $this->hasMany(uploadDocFile::class);
    }

}
