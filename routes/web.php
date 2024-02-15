<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DatasetController::class,'index'])->name('datasetHome');
Route::get('/modify-dataset/{id}', [DatasetController::class,'modifyDataset'])->name('modifyDataset');
Route::post('/save-new-order',[DatasetController::class,'saveOrder'])->name('saveModifiedOrder');
Route::get('/modified-version/{id}',[DatasetController::class,'modifiedVersions'])->name('modifiedVersions');
