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

    public function index(){
        $data = Configuration::first();
        return view('documents.configuration', compact('data'));
    }


    public function saveUploadSetting(Request $request) {
        // Validate input
        $request->validate([
            'max_file_size'   => 'required|integer|min:1',
            'max_total_size'  => 'required|integer|min:1',
            'max_no_files'    => 'required|integer|min:1',
            'virus_scanning'  => 'nullable',
        ]);

        $settings = Configuration::first();  

        $settings->max_file_size  = $request->max_file_size;
        $settings->max_total_size = $request->max_total_size;
        $settings->max_no_files   = $request->max_no_files;
        $settings->virus_scanning = $request->has('virus_scanning') ? 1 : 0;

        $settings->save();

        return back()->with('success', 'Upload settings saved!');
    }   


    public function saveSystemSettings(Request $request){
        Configuration::updateOrCreate(
            ['id' => 1],
            [
                'app_name'            => $request->app_name,
                'support_email'       => $request->support_email,
                'email_notification'  => $request->has('email_notification'),
                'document_versioning' => $request->has('document_versioning'),
                'retention_days'      => $request->retention_days,
            ]
        );

        return back()->with('success', 'System settings updated successfully');
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
