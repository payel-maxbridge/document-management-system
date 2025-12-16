<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Configuration, FileConfiguration, UploadDocument, UploadDocFile};

class DocumentController extends Controller
{
    //
    public function docList(){
        return view ('documents.documents');
    }

    //Configuration page

    public function index(){
        $data = Configuration::first();

        if(!$data){
            $data = Configuration::create([
                'user_id' => auth()->id()
            ]);
        }
        $fileType = FileConfiguration::fileType();
        return view('documents.configuration', compact('data', 'fileType'));
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
        $uploadsettings->user_id = auth()->id();

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
       $systemsetting->user_id = auth()->id();

       $systemsetting->save();

       return response()->json(['status' => 'success']);
    }

    public function saveFileTypes(Request $request){
        $request->validate([
            'allowed_file_type' => 'array'
        ]);

        Configuration::first()->update(
            ['allowed_file_type' => $request->allowed_file_type]
        );
        
        return response()->json(['status' => 'success']);
    }

    //upload document page

    public function uploadDocumentIndex(){
        $data = Configuration::first();
        return view ('documents.upload', compact('data'));
    }

    public function uploadDocumentStore(Request $request){
        //dd($request->all());
        $config = Configuration::first();
        $request->validate([
            'title'     => 'required|string|max:255',
            'doc_type'  => 'required',
            'tags'      => 'nullable|array',
            'tags.*'    => 'string|max:50',
            'approval_flow'  => 'required',
            'files'     => 'required|array|max:' . $config->max_no_files,
            'files.*'   => 'file|max:' . ($config->max_file_size * 1024) . '|mimes:'.implode(',', $config->allowed_file_type)
        ]);

        $document = UploadDocument::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'doc_type'      => $request->doc_type,
            'approval_flow' => $request->approval_flow,
            'visibility'    => $request->visibility,
            'tags'          => $request->tags ?? [],            
            'user_id'       => auth()->id(),
        ]);

        foreach($request->file('files') as $file) {
            $path = upload_file($file);
            //dd($path);
            UploadDocFile::create([
                'user_id'   => auth()->id(),
                'upload_doc_id' => $document->id,
                'doc_type'  => $request->doc_type,
                'doc_tags'  => $request->tags ?? [],
                'file_path' => $path,
                'file_type' => $file->getMimeType()
            ]);

        }

        return response()->json(['status' => 'success', 'message' => 'Document uploaded successfully']);

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
