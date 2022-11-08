<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/save', [ContactController::class, 'store']);
Route::get('/get-contacts', [ContactController::class, 'index']);
Route::get('/get-contact/{contact_id}', [ContactController::class, 'edit']);
Route::get('/get-contact/{contact_id}', [ContactController::class, 'show']);
Route::delete('/get-contact/{contact_id}', [ContactController::class, 'destroy']);