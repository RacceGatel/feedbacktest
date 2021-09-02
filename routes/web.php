<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    Route::get('/download/{id}', [App\Http\Controllers\DownloadController::class, 'downloadById'])->where('id', '[0-9]+');

    Route::get('/feedback',  [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback');

    Route::post('/feedback',  [App\Http\Controllers\FeedbackController::class, 'createOrder'])->name('feedback.create');

    Route::get('/orders',  [App\Http\Controllers\OrdersController::class, 'index'])->name('orders');
});

Route::get('/{any}', function () {
    return redirect()->route('feedback');
})->where('any', '.*');
