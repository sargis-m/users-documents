<?php

use App\Http\Controllers\CDocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('documents')->group(function () {
    Route::put('edit/{id}', [CDocumentController::class, 'edit'])->name('document.edit');
    Route::delete('delete/{id}', [CDocumentController::class, 'delete'])->name('document.delete');
});
