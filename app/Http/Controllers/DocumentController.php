<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class DocumentController extends Controller
{
    //
    public function docList(){
        return view ('documents.documents');
    }

    //Configuration page

    public function index(){
        $data = Configuration::first();
        return view('documents.configuration', compact('data'));
    }

    //configuration/ save file upload setting
    public function saveUploadSetting(Request $request) {
        // Validate input
        $request->validate([
            'max_file_size'   => 'required|integer|min:1',
            'max_total_size'  => 'required|integer|min:1',
            'max_no_files'    => 'required|integer|min:1',
            'virus_scanning'  => 'nullable',
        ]);

        $uploadsettings = Configuration::first();  

        $uploadsettings->max_file_size  = $request->max_file_size;
        $uploadsettings->max_total_size = $request->max_total_size;
        $uploadsettings->max_no_files   = $request->max_no_files;
        $uploadsettings->virus_scanning = $request->has('virus_scanning') ? 1 : 0;

        $uploadsettings->save();

        return response()->json(['status' => 'success']);
    }   

    //configuration/ save system setting
    public function saveSystemSetting(Request $request){
       $request->validate([
            'app_name' => 'required|string',
            'support_email'         => 'required|string',
            'email_notification'    => 'nullable',
            'document_versioning'   => 'nullable',
            'retention_days'        => 'nullable',
       ]);

       $systemsetting = Configuration::first();

       $systemsetting->app_name         = $request->app_name;
       $systemsetting->support_email    = $request->support_email;
       $systemsetting->email_notification   = $request->has('email_notification') ? 1 : 0;
       $systemsetting->document_versioning  = $request->has('document_versioning') ? 1 : 0;
       $systemsetting->retention_days   = $request->retention_days;

       $systemsetting->save();

       return response()->json(['status' => 'success']);
    }

    public function saveFileTypes(Request $request){
        $request->validate([
            'allowed_file_type' => 'required|array'
        ]);

        $fileType = Configuration::first();

        $fileType->allowed_file_type    = $request->allowed_file_type;
        $fileType->save();

        return response()->json(['status' => 'success']);
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
