<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    //
    public function hierarchy(){
        return view ('user-management.user-hierarchy');
    }

    public function permissions(){
        return view ('user-management.permissions');
    }

   
}
