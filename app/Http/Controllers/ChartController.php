<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RLSDDSP;
use App\Models\Stock;
use App\Models\Iar;
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
}
