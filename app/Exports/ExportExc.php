<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfWriter;
use App\Models\Inventory;

class ExportExc implements WithHeadings, FromView
{
    public function view(): View
    {
        // Load existing Excel template
        $spreadsheet = IOFactory::load(storage_path('app/IAR.xlsx'));
    
        // Manipulate the loaded template as needed
    
        // Fetch data from your model
        $data = Inventory::all();
    
        // Add data to the template as needed, assuming column names are 'item' and 'quantity'
        $row = 19; // Start from row 19
        foreach ($data as $item) {
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $item->item);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $item->quantity);
            $row++;
        }
    
        // Return the modified template
        return view('welcome', ['spreadsheet' => $spreadsheet]);
    }
    

    public function headings(): array
    {
        // Define the column headings based on your model
        return [
            'item',
            'quantity',
            // Add more columns if needed
        ];
    }

    // Define the export method to generate Xlsx file directly
    public function export()
    {
        $spreadsheet = $this->view()->getData()['spreadsheet'];
            $writer = new Xlsx($spreadsheet);
            ob_start();
            $writer->save('php://output');
            $content = ob_get_contents();
            ob_end_clean();
        
            return response()->make($content, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="IAR.xlsx"',
            ]);
        
    }
    public function exportPdf()
    {
        $spreadsheet = $this->view()->getData()['spreadsheet'];

        ob_start();
        $pdfWriter = new PdfWriter($spreadsheet);
        $pdfWriter->save('php://output');
        $content = ob_get_contents();
        ob_end_clean();

        return response()->make($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="IAR.pdf"',
        ]);
    }
}
