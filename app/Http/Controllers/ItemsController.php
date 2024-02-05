<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Iar;

class ItemsController extends Controller
{
    public function index(){
        $iars = Iar::get();
        $items = Item::leftJoin('iar_tbl', 'items_tbl.iar_id', '=', 'iar_tbl.iar_id')
        ->select('items_tbl.*', 'iar_tbl.*')
        ->where('iar_tbl.iar_id', '=', 'items_tbl.iar_id')
        ->get();
    
        return view('admin.item.view-items', compact('items', 'iars'));
    }
    
    
    

    // para makuha ang id ng iar
    public function show($id){
        $iars = Iar::where('iar_tbl.iar_id', '=', $id)->get();
        $items = Item::leftJoin('iar_tbl', 'items_tbl.iar_id', '=', 'iar_tbl.iar_id')
        ->select('items_tbl.*', 'iar_tbl.*')
        ->where('iar_tbl.iar_id', '=', $id)
        ->get();
        return view('admin.item.view-items', compact('items', 'iars'));
    }  


    public function create(){
        $items = Item::get();
        return view('admin.item.create-items', compact('items'));
    }

    public function store(Request $request, $iar_id){
        $request->validate([ 
            'item_name' => 'required',
            'item_desc' => 'required',
            'item_unit' => 'required',
            'item_quantity' => 'required',
        ]);
    
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_desc = $request->item_desc;
        $items->item_unit = $request->item_unit;
        $items->item_quantity = $request->item_quantity;
        $items->iar_id = $iar_id;
    
        $items->save();
    
        return redirect('iar')->with('success', 'SUCCESSFULLY ADDED');
    }
    
    public function addItemForm($iar_id){
        $iar = IAR::find($iar_id);
        return view('admin.item.create-items', ['iar' => $iar, 'iar_id' => $iar_id]);
    }

    public function showArchived($iar_id)
{
    $iars = Iar::where('iar_tbl.iar_id', '=', $iar_id)->onlyTrashed()->get();

    // Retrieve only the trashed items for the specified Iar
    $trashedItems = Item::leftJoin('iar_tbl', 'items_tbl.iar_id', '=', 'iar_tbl.iar_id')
        ->select('items_tbl.*', 'iar_tbl.*')
        ->where('iar_tbl.iar_id', '=', $iar_id)
        ->onlyTrashed()  // Include only trashed items
        ->get();

    return view('admin.item.archived-item', compact('trashedItems', 'iars'));
}

    
}
