<?php
use Illuminate\Support\Facades\Route;
use Modules\Efipix\Http\Controllers\EfipixController;
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

Route::get('/efipix', [EfipixController::class, 'index']) -> name('efipix.index');
Route::get('/efipix/create', [EfipixController::class, 'create']) -> name('efipix.create');
Route::post('/efipix/store', [EfipixController::class, 'store']) -> name('efipix.store');Route::get('/efipix/destroy/{id}', [EfipixController::class, 'destroy']) -> name('efipix.destroy');
Route::get('/efipix/edit/{id}', [EfipixController::class, 'edit']) -> name('efipix.edit');
Route::post('/efipix/update/{id}', [EfipixController::class, 'update']) -> name('efipix.update');

