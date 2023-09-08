<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\order;
use App\Models\User;
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
    return view('index');
});

Auth::routes();

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashbord'])->name('dashbord');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/user/delete/{id}',[HomeController::class,'user_delete'])->name('user.delete');

Route::get('/create_user',[HomeController::class,'create_user'])->name('create_user');
Route::post('/user_stor',[HomeController::class,'user_stor'])->name('user_stor');
Route::get('/edit_users/{id}',[HomeController::class,'edit_users'])->name('edit_users');
Route::post('/edit_users_up/{id}',[HomeController::class,'edit_users_up'])->name('edit_users_up');
Route::post('/hometracking',[HomeController::class,'hometracking'])->name('hometracking');

Route::get('/adminorder', [App\Http\Controllers\OrderController::class, 'adminorder'])->name('adminorder');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
Route::get('/create_order', [App\Http\Controllers\OrderController::class, 'create_order'])->name('create_order');
Route::post('/stororder', [App\Http\Controllers\OrderController::class, 'stororder'])->name('ordercreatepost');
Route::get('/edit_order/{id}', [App\Http\Controllers\OrderController::class, 'edit_order'])->name('create_order');
Route::post('/edit_order_rd/{id}', [App\Http\Controllers\OrderController::class, 'edit_order_rd'])->name('edit_order_rd');
Route::post('/updateorder/{id}', [App\Http\Controllers\OrderController::class, 'updateorder'])->name('create_order');
Route::get('/delete_order/{id}', [App\Http\Controllers\OrderController::class, 'delete_order'])->name('create_order');
Route::get('/pending_delivery', [App\Http\Controllers\OrderController::class, 'pending_delivery'])->name('pending_delivery');
Route::get('/complete_delivery', [App\Http\Controllers\OrderController::class, 'complete_delivery'])->name('complete_delivery');
Route::get('/Processing_delivery', [App\Http\Controllers\OrderController::class, 'Processing_delivery'])->name('Processing_delivery');
Route::get('/Retrun_delivery', [App\Http\Controllers\OrderController::class, 'Retrun_delivery'])->name('Retrun_delivery');
Route::get('/holddelivery', [App\Http\Controllers\OrderController::class, 'holddelivery'])->name('holddelivery');
Route::get('/viewinvoice/{id}', [App\Http\Controllers\OrderController::class, 'viewinvoice'])->name('viewinvoice');
Route::get('/tracking/{id}', [App\Http\Controllers\OrderController::class, 'tracking'])->name('tracking');
Route::get('/Merchant_Due_Payment', [App\Http\Controllers\OrderController::class, 'Merchant_Due_Payment'])->name('Merchant_Due_Payment');
Route::get('/due_edit/{id}', [App\Http\Controllers\OrderController::class, 'due_edit'])->name('due_edit');
Route::post('/due_edit_up/{id}', [App\Http\Controllers\OrderController::class, 'due_edit_up'])->name('due_edit_up');



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


Route::get('/clear', function() {

Artisan::call('cache:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
return "Cleared!";
});


Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});





