<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RLSDDSP;
use App\Models\Stock;
use App\Models\Iar;
use App\Models\Item;
use App\Models\User;
class ChartController extends Controller

{
    public function index()
    {
        return view('manager.dashboard');
    }
    public function getIar()
    {
        $iarCount = Iar::count();
        return response()->json(['count' => $iarCount]);
    }
    public function getInventoryData()
    {
        $inventoryData = Item::select('item_name', 'item_quantity')->get();
        return response()->json($inventoryData);
    }
    public function getInventoryDates()
    {
        $inventoryDates = Item::select('created_at')->get();
        return response()->json($inventoryDates);
    }
}
