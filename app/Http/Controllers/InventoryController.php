<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Inventory;
Use App\Models\BfarOffice;

class InventoryController extends Controller
{
    
    public function index()
    {
        $officeModel= new BfarOffice();
        $officeOptions= $officeModel->getOptions();
        $itemsWithIar = Item::with('iar')->get();
        return view('admin.inventory.view-inventory', compact('itemsWithIar','officeOptions'));
    }


    public function store(Request $request){
        $request->validate([
            'inventory_name'=>'required', 
            'inventory_category'=>'required', 
            'inventory_quantity'=>'required', 
            'inventory_status'=>'required', 
        ]);
        Inventory::create($request->all());
            return redirect('view-inventory')->with('success', 'SUCCESSFULLY ADDED');
    }

    public function edit($id){
        $inventories = Inventory::find($id);
        return view('admin.inventory.edit-inventory', compact('inventories'));

    }

    public function update(Request $request, $id){
        $request->validate([
            'inventory_name'=>'required', 
            'inventory_category'=>'required', 
            'inventory_quantity'=>'required', 
            'inventory_status'=>'required', 
        ]);
        $inventories = Inventory::find($request['inventory_id']);
        $inventories->update($request->all());
        return redirect('/view-inventory')->with('success', 'SUCCESSFULLY UPDATED');
    }

    public function archive(){
        $inventories = Inventory::withTrashed()
        ->where('tbl_inventory.deleted_at', '!=', null)->get();
        return view('admin.inventory.archive-inventory', compact('inventories'));
    }

    public function delete($id){
        $inventories = Inventory::find($id)->delete();
        return redirect()->back()->with('success', 'SUCCESSFULLY DELETED');
    }

    public function restore($id){
        $inventories = Inventory::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'SUCCESSFULLY RESTORED');
    }



    
}
