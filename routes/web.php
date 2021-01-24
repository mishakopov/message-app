<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MessageController;
use \App\Http\Controllers\SendMessageController;
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

Route::get('/', [MessageController::class, 'index']);
Route::get('/second-page', [MessageController::class, 'secondPageShow']);
Route::post('send-message', [SendMessageController::class, 'sendSave']);
