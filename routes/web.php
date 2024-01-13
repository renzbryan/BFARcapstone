<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IarController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

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


Route::resources([
    'iar' => IarController::class,
]);

Route::resources([
    'item' => ItemsController::class,
]);

Route::get('/iar/{iar_id}/create-items', [ItemsController::class, 'addItemForm'])->name('items.create');
Route::post('/iar/{iar_id}/create-items', [ItemsController::class, 'store'])->name('item.store');
Route::get('/iar/{iar_id}/view-items', [ItemsController::class, 'index'])->name('items.index');


Route::get('/items', 'ItemsController@index')->name('items.index');





require __DIR__.'/auth.php';
