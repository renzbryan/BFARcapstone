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
use App\Models\Task;
use PhpOffice\PhpSpreadsheet\IOFactory;

class IarController extends Controller
{
    public function index(){
        $iars = Iar::with(['comments.user'])->get();
        return view('admin.iar.view-iar', compact('iars'));
    }

        public function create()
        {
            $lastIar = Iar::orderBy('iar_id', 'desc')->first();
            if ($lastIar) {
                $lastInsertedId = $lastIar->iar_id;
            } else {
                $lastInsertedId = 0; 
            }
            $iarNumber = 'IAR-' . str_pad($lastInsertedId + 1, 4, '0', STR_PAD_LEFT);
            $model = new BfarOffice();
            $officeOptions = $model->getOptions();
            $iars = Iar::get();
            return view('admin.iar.create-iar', compact('iars', 'officeOptions', 'iarNumber'));
        }
    
    public function getOfficeCode($id)
    {
        $model = new BfarOffice();
        $office = $model->find($id);
    
        if ($office) {
            $officeCode = $office->rcc; 
            return response()->json(['officeCode' => $officeCode]);
        } else {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $iar= new IAR();
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

        $selectedOfficeId = $request->iar_rod;
        $selectedOffice = BfarOffice::findOrFail($selectedOfficeId);
        $iarRodValue = $selectedOffice ? $selectedOffice->office : null;
        $requestData = $request->all();
        $requestData['iar_rod'] = $iarRodValue;
        Iar::create($requestData);
        $taskId = $request->input('task_id'); // Assuming you have a hidden input field in your form containing the task ID
        if ($taskId) {
            $task = Task::findOrFail($taskId);
            $task->status = 'done';
            $task->save();
        }
        return redirect('iar')->with('success', 'SUCCESSFULLY ADDED');
    }
    


    public function downloadExcel($rowId)
    {
        try {
            // Create an instance of your ExportExc class with the given row ID
            $export = new ExportExc($rowId);

            // Call the export method to download the Excel file
            return $export->export();
        } catch (\Exception $e) {
            Log::error('Error exporting Excel: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while exporting the Excel file.'
            ], 500);
        }
    }

    public function showForm()
    {
        return view('exceledit');
    }
    public function updateExcel(Request $request)
    {
        $selectedFile = $request->input('excel_file');
        $filePaths = [
            'iar' => storage_path('app/IAR.xlsx'),
            'another_excel' => storage_path('app/Another_Excel.xlsx'),
            'yet_another_excel' => storage_path('app/Yet_Another_Excel.xlsx'),
        ];
        if (!array_key_exists($selectedFile, $filePaths)) {
            return redirect()->back()->with('error', 'Invalid file selected.');
        }
    
        $filePath = $filePaths[$selectedFile];
        $spreadsheet = IOFactory::load($filePath);
        $updatedValue = strtoupper($request->input('updated_value'));
        $spreadsheet->getActiveSheet()->setCellValue('G51', $updatedValue);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePath);
    
        return redirect()->route('setting.index')->with('success', ucfirst($selectedFile).' Excel file edited successfully!');
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
    public function test(){
        return view('test');
    }
    
}
