<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController, ChartController, ChatController, CommentController, FileSending, IarController, 
    InventoryController, ItemsController, LoginController, MessageController, OfficeController, 
    ProfileController, PropertyController, RLSDDSPController, StockController, TaskController, 
    UserController, UserTaskController, WMRController, WorkerAcc,RISController,ScitemController,FormCOntroller,PcitemController,DashboardController,
};
use App\Http\Livewire\PrintPreview;

Route::get('forms', [FormController::class, 'index'])->name('forms.index');


use App\Http\Controllers\StudentController;

Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('students/archived', [StudentController::class, 'archived'])->name('students.archive');
    Route::patch('students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Organized routes for the application
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::get('/admindashboard', [ChatController::class, 'index'])->name('admin.index')->middleware('admin');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // IAR Routes
    Route::resource('iar', IarController::class);
    Route::get('/item/{id}', [ItemsController::class, 'show'])->name('item.show');
    Route::get('/iar/{iar_id}/create-items', [ItemsController::class, 'addItemForm'])->name('items.create');
    Route::post('/iar/{iar_id}/create-items', [ItemsController::class, 'store'])->name('items.store');
    Route::get('/iar/{iar_id}/view-items', [ItemsController::class, 'index'])->name('items.index');
    Route::get('/iar/delete/{iar_id}', [IarController::class, 'deleteIar'])->name('delete.iar');
    
    // Archive Routes
    Route::get('/archived/iar', [IarController::class, 'archiveIar'])->name('archive.iar');
    Route::get('/archived/{iar_id}/iar/restore', [IarController::class, 'restoreIar'])->name('restore.iar');
    Route::get('/archived/{iar_id}/item', [ItemsController::class, 'showArchived'])->name('archive.item');

    // Stock Routes
    Route::resource('stock', StockController::class);
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');


    // Inventory Routes
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

    // Property Routes
    Route::get('/property', [PropertyController::class, 'index'])->name('property.index'); // Restored Property Route

    // WMR Routes
    Route::get('/wmr', [WMRController::class, 'index'])->name('wmr.index');

    // Task Routes
    Route::get('/tasks', [TaskController::class, 'task'])->name('tasks.index');
    Route::get('/tasks/{user}/assign', [TaskController::class, 'assignForm'])->name('tasks.assignForm');
    Route::post('/tasks/{user}/assign', [TaskController::class, 'assignTask'])->name('tasks.assignTask');
    Route::get('/usertasks', [UserTaskController::class, 'index'])->name('usertasks.index');
    Route::get('/tasks/{task}/{type}', [UserTaskController::class, 'doTask'])->name('tasks.do');

    // Office Routes
    Route::get('/bfar-office/create', [OfficeController::class, 'createForm'])->name('bfar_office.create');
    Route::post('/bfar-office/store', [OfficeController::class, 'store'])->name('bfar_office.store');
    
    // Upload & File Routes
    Route::get('/upload', [FileSending::class, 'showUploadForm']);
    Route::post('/upload', [FileSending::class, 'upload']);
    
    // Miscellaneous Routes
    Route::get('/print-preview/{iarId}', PrintPreview::class)->name('print.preview.excel');
    Route::get('/chat', fn() => redirect()->route('chatify'))->name('chat.index')->middleware('auth');
    Route::post('/messages', [MessageController::class, 'store'])->middleware('auth');

    // Generate Reports & Settings
    Route::post('/generate-report', [AdminController::class, 'generate'])->name('generate.report');
    Route::get('/setting', [UserController::class, 'viewsetting'])->name('setting.index');

    // Updating Excel routes
    Route::get('/update-excel', [IarController::class, 'showForm'])->name('show.form');
    Route::post('/update-excel', [IarController::class, 'updateExcel'])->name('update.excel');
    Route::get('/test/printexcel/{iar_id}', [IarController::class, 'downloadExcel'])->name('export.excel');

    // Updating Item Designation
    Route::post('update-items-stock', [ItemsController::class, 'updateItemsStock'])->name('update.items.stock');
    Route::post('update-items-property', [ItemsController::class, 'updateItemsProperty'])->name('update.items.property');
    Route::post('update-items-wmr', [ItemsController::class, 'updateItemsWMR'])->name('update.items.wmr');
    
    // Admin routes
    Route::post('/generate-report', [AdminController::class, 'generate'])->name('generate.report');

    // Category routes
    Route::post('/insert-category', [ItemsController::class, 'insertcateg'])->name('category.insert');

    // User settings
    Route::get('/setting', [UserController::class, 'viewsetting'])->name('setting.index');


//scitems
Route::resource('scitems', ScitemController::class);

//ris routes
Route::resource('ris', RISController::class);


    // Additional custom routes
    Route::resource('pcitems', PcitemController::class);
    Route::get('pcitems/create/{id}', [PcitemController::class, 'create'])->name('pcitems.create');

    //dashboard
    Route::resource('dashboard', DashboardController::class);
    Route::get('/dashboard/stock-counts', [DashboardController::class, 'getStockCounts']);

});

Route::get('stocks', [StockController::class, 'index'])->name('stocks.index');
Route::get('scitems/{id}', [ScitemController::class, 'index'])->name('scitems.index');
Route::get('scitems/{id}', [ScitemController::class, 'show'])->name('scitems.show');
Route::get('scitems/{id}/edit', [ScitemController::class, 'edit'])->name('scitems.edit');
Route::put('scitems/{id}', [ScitemController::class, 'update'])->name('scitems.update');
Route::put('/scitems/{id}', [ScitemController::class, 'update'])->name('scitems.update');
Route::post('/scitems/store', [ScitemController::class, 'store'])->name('scitems.store');
// Download File Route
Route::get('download/{file}', fn($file) => Storage::download('app/' . $file))->name('download');

// Chart Routes (No middleware required)
Route::get('/get-iar', [ChartController::class, 'getIar']);
Route::get('/get-inventory-data', [ChartController::class, 'getInventoryData']);
Route::get('/get-inventory-dates', [ChartController::class, 'getInventoryDates']);

// Comment Routes (Authenticated)
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});



Route::resource('properties', PropertyController::class);


// Authentication Routes
require __DIR__.'/auth.php';

