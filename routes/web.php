<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IarController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileSending;
use App\Http\Controllers\StockController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resources([
        'iar' => IarController::class,
    ]);
});

Route::resources([
    'item' => ItemsController::class,
]);

Route::resources([
    'stock' => StockController::class,
]);

Route::get('stock/card_form', [StockController::class, 'createStockCardForm'])->name('stock.card_form');

Route::resources([
    'rlsddsp' => RLSDDSPController::class,
]);

Route::get('/iar/{iar_id}/create-items', [ItemsController::class, 'addItemForm'])->name('items.create');
Route::post('/iar/{iar_id}/create-items', [ItemsController::class, 'store'])->name('items.store');
Route::get('/iar/{iar_id}/view-items', [ItemsController::class, 'index'])->name('items.index');

Route::get('/worker', [WorkerAcc::class, 'index']);
Route::any('worker/register', [WorkerAcc::class, 'register'])->name('register');
Route::get('/test/printexcel/{iar_id}', [IarController::class, 'downloadExcel'])->name('export.excel');

Route::get('/iar/delete/{iar_id}', [IarController::class, 'deleteIar'])->name('delete.iar');

//archive
Route::get('/archived/iar', [IarController::class, 'archiveIar'])->name('archive.iar');
Route::get('/archived/{iar_id}/iar/restore', [IarController::class, 'restoreIar'])->name('restore.iar');
Route::get('/archived/{iar_id}/item', [ItemsController::class, 'showArchived'])->name('archive.item');


Route::post('update-items-stock', [ItemsController::class, 'updateItemsStock'])->name('update.items.stock');
Route::post('update-items-property', [ItemsController::class, 'updateItemsProperty'])->name('update.items.property');
Route::post('update-items-wmr', [ItemsController::class, 'updateItemsWMR'])->name('update.items.wmr');

require __DIR__.'/auth.php';
