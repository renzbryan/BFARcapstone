<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iar;
use App\Exports\ExportExc;

class IarController extends Controller
{
    public function index(){
        $iars = Iar::get();
        return view('admin.iar.view-iar', compact('iars'));
    }

    public function create(){
        $iars = Iar::get();
        return view('admin.iar.create-iar', compact('iars'));
    }

    public function store(Request $request){
        $request->validate([ 
            'iar_entityname'=>'nullable', 
            'iar_fundcluster'=>'nullable', 
            'iar_supplier'=>'nullable', 
            'iar_Podate'=>'nullable', 
            'iar_rod'=>'nullable', 
            'iar_rcc'=>'nullable', 
            'iar_number'=>'nullable', 
            'iar_date'=>'nullable', 
            'iar_invoice'=>'nullable', 
            'iar_invoice_d'=>'nullable', 
        ]);
        Iar::create($request->all());
            return redirect('iar')->with('success', 'SUCCESSFULLY ADDED');
    }

    public function downloadExcel($id)
    {
            $rowID = Iar::find($id);
            $export = new ExportExc($rowID->iar_id);
            return $export->export();
    }
    
}
