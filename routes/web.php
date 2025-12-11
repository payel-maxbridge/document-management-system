<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, DashboardController, DocumentController, ApprovalController, UserManagementController,
SystemConfigController};
use App\Http\Controllers\auth\{LoginController, LogoutController, RegisterController};

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function (){
    //Authentication/register
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('showRegister');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    //Authentication/login
    Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

//Authentication/logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function (){
    //dashboard page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/index', [HomeController::class, 'index'])->name('index');

    //documents
    Route::get('/documents', [DocumentController::class, 'docList'])->name('documents');
    Route::get('/upload', [DocumentController::class, 'upload'])->name('upload');
    Route::get('/document-explorer', [DocumentController::class, 'docExplorer'])->name('document-explorer');
    Route::get('/document-explorer/document-view', [DocumentController::class, 'docView'])->name('document-view');
    Route::get('/document-lifecycle', [DocumentController::class, 'docLifecycle'])->name('document-lifecycle');

    //approvals
    Route::get('/approvals', [ApprovalController::class, 'approvalList'])->name('approvals');

    //user management
    Route::get('/user-hierarchy', [UserManagementController::class, 'hierarchy'])->name('user-hierarchy');
    Route::get('/permissions', [UserManagementController::class, 'permissions'])->name('permissions');

    //system-configuration
    Route::get('/flow-configuration', [SystemConfigController::class, 'flowConfig'])->name('flow-configuration');
    Route::get('/configuration', [SystemConfigController::class, 'configuration'])->name('configuration');
    Route::get('/audit-trail', [SystemConfigController::class, 'audit'])->name('audit-trail');
});



