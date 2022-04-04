<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
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
// adding new comment to route page
Route::get('/', function () {
    return view('welcome');
});

Route::resource('merchant', MerchantController::class, ['names' => 'merchant', ])->only([
    'index', 'create', 'store'
]);
