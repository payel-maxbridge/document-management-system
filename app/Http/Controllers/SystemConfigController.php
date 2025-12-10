<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemConfigController extends Controller
{
    //
    public function flowConfig(){
        return view('system-configuration.flow-configuration');
    }

    public function configuration(){
        return view('system-configuration.configuration');
    }

    public function audit(){
        return view('system-configuration.audit-trail');
    }
}
