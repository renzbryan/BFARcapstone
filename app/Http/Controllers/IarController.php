<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iar;
use App\Exports\ExportExc;
use App\Models\Item;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExportClass;
use App\Imports\ExcelImport;


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


    public function updateExcel(Request $request)
    {
        $file = $request->file('excel_file');

        // Validate and import the Excel file
        Excel::import(new ExcelImport, $file);

        // Export the modified data back to Excel
        Excel::store(new YourExportClass, 'modified_file.xlsx');

        return 'Excel file updated successfully!';
    }

    public function deleteIar($iar_id){
    $iar = Iar::find($iar_id);
    $iar->items()->delete();
    $iar->delete();
    return redirect('iar')->with('success', 'Iar and related items deleted successfully.');
    }

    public function archiveIar(){
        $softDeletedItem = Iar::onlyTrashed()->get();
        return view('admin.iar.archive-iar', compact('softDeletedItem'));
    }

    public function restoreIar($iar_id)
    {
        Iar::withTrashed()->where('iar_id', $iar_id)->restore();
        Item::where('iar_id', $iar_id)->withTrashed()->restore();
        return redirect('iar')->with('success', 'Iar and associated items restored successfully.');
    }
}
