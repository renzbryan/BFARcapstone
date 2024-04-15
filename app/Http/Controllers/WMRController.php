<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iar;
use App\Exports\ExportExc;
use App\Models\Item;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use App\Models\BfarOffice;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class WMRController extends Controller
{

    // public function index(){
    //     $stocks = Item::get();
    //     return view('admin.stock.view-stock', compact('stock'));
    // }

    public function index()
    {
        // Fetch items where is_stock column is not null
        $wmrEntries = Item::whereNotNull('is_wmr')->get();
    
        // Pass the data to the view and return the view
        return view('admin.wmr.view-wmr', compact('wmrEntries'));
    }
}
