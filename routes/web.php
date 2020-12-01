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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('payments/create', 'PaymentsController@create')->middleware('auth')->name('payments.create');
Route::post('payments', 'PaymentsController@store')->middleware('auth');

Route::get('notifications', 'UserNotificationsController@show')->middleware('auth')->name('notifications.show');

Route::get('conversations', 'ConversationController@index')->name('conversations.index');
Route::get('conversations/{conversation}', 'ConversationController@show')->middleware('can:view,conversation');
Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');
