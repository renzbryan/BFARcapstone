<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\Item;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.task.assigntask');
    }

    public function generate(Request $request)
    {
        // Retrieve inventory data
        $items = Item::all();
    
        // Define column labels
        $header = [
            'Item Name',
            'Item Description',
            'Item Unit',
            'Item Quantity',
            'Is Stock',
            'Is Property',
            'Is WMR',
        ];
    
        // Process data to generate report
        $reportData = [];
        foreach ($items as $item) {
            $isStock = $item->is_stock == 1 ? 'Yes' : 'No';
            $isProperty = $item->is_property == 1 ? 'Yes' : 'No';
            $isWmr = $item->is_wmr == 1 ? 'Yes' : 'No';
            
            $reportData[] = [
                $item->item_name,
                $item->item_desc,
                $item->item_unit,
                $item->item_quantity,
                $isStock,
                $isProperty,
                $isWmr,
            ];
        }
    
        // Format the CSV report data
        $csvFormattedData = implode(',', $header) . PHP_EOL; // Add header row
        foreach ($reportData as $row) {
            $csvFormattedData .= implode(',', $row) . PHP_EOL;
        }
    
        // Generate and download the CSV report
        $csvFileName = 'inventory_report.csv';
        $csvFilePath = storage_path('app/' . $csvFileName);
        file_put_contents($csvFilePath, $csvFormattedData);
    
        // Generate and download the PDF report
        $pdfFileName = 'inventory_report.pdf';
        $pdfFilePath = storage_path('app/' . $pdfFileName);
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('manager.dashboard', compact('header', 'reportData')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        file_put_contents($pdfFilePath, $dompdf->output());
    
        // Return download links or redirect to download page
        return response()->json([
            'csv_download_link' => route('download', ['file' => $csvFileName]),
            'pdf_download_link' => route('download', ['file' => $pdfFileName]),
        ]);
    }
    
}
