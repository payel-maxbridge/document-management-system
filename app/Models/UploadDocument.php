<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadDocument extends Model
{
    //
    public $table = "upload_documents";
    
    public $fillable = ['title', 'description', 'doc_type', 'tags', 'approval_flow', 'visibility', 'files', 'user_id'];

    protected $casts = [
        'tags' => 'array',
        'files' => 'array'
    ];

    public function user() {
       return $this->belongTo(User::class);
    }

}
