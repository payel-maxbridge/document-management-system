<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    //
    public function approvalList(){
        return view ('approvals.approvalList');
    }
}
