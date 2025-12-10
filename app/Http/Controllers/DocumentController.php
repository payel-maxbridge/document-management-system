<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function docList(){
        return view ('documents.documents');
    }

    public function upload(){
        return view ('documents.upload');
    }

    public function docExplorer(){
        return view ('documents.document-explorer');
    }

    public function docView(){
        return view ('documents.document-view');
    }
    public function docLifecycle(){
        return view ('documents.document-lifecycle');
    }
}
