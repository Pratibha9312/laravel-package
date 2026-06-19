<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataTableController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/datatable-test', [DataTableController::class, 'users']);
