<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/documents', function () {
    return view('documents');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/approvals', function () {
    return view('approvals');
});
Route::get('/user-hierarchy', function () {
    return view('user-hierarchy');
});
Route::get('/flow-configuration', function () {
    return view('flow-configuration');
});
Route::get('/permissions', function () {
    return view('permissions');
});
Route::get('/configuration', function () {
    return view('configuration');
});
Route::get('/document-explorer', function () {
    return view('document-explorer');
});
Route::get('/audit-trail', function () {
    return view('audit-trail');
});
Route::get('/document-lifecycle', function () {
    return view('document-lifecycle');
});