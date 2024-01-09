<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\IarController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('view-inventory', [InventoryController::class, 'index']);
    // Route::get('create-inventory', [InventoryController::class, 'create']);
    // Route::post('/store-inventory', [InventoryController::class, 'store']);
    // Route::get('edit-inventory/{inventory_id}', [InventoryController::class, 'edit']);
    // Route::put('update-inventory/{inventory_id}', [InventoryController::class, 'update'])->name('update-inventory');
    // Route::get('/delete-inventory/{inventory_id}', [InventoryController::class, 'delete']);
    // Route::get('archive-inventory', [InventoryController::class, 'archive']);
    // Route::get('/restore-inventory/{inventory_id}', [InventoryController::class, 'restore']);

    Route::resources([
        'iar' => IarController::class,
    ]);

    Route::get('archive-iar', [IarController::class, 'archive']);
    Route::get('/restore-iar/{id}', [IarController::class, 'restore']);

});



require __DIR__.'/auth.php';
