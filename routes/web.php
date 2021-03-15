<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'Controller@index']);
Route::get('/txt', ['as' => 'export.txt', 'uses' => 'Controller@exportTxt']);
Route::get('/excel', ['as' => 'export.excel', 'uses' => 'Controller@exportExcel']);
Route::get('/pdf', ['as' => 'export.pdf', 'uses' => 'Controller@exportPdf']);