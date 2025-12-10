<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, DashboardController, DocumentController, ApprovalController, UserManagementController,
SystemConfigController};

// Route::get('/', function () {
//     return view('welcome');
// });

//Home page
Route::get('/index', [HomeController::class, 'index'])->name('index');

//dashboard page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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


