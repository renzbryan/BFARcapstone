<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfWriter;
use App\Models\Iar;
use App\Models\Item;
use Illuminate\Support\Facades\Log;

class ExportExc implements WithHeadings, FromView
{
    protected $rowId;
    public function __construct($rowid)
    {
    
        $this->rowId =$rowid;
    }

    public function view(): View
    {
        try {
            $spreadsheet = IOFactory::load(storage_path('app/IAR.xlsx'));
            $data = Iar::find($this->rowId); // Debugging statement
            $itemss = Item::where('iar_id', '=', $this->rowId)->get();
            if ($data) {
                $spreadsheet->getActiveSheet()->setCellValue('D' . 10, $data->iar_entityname);
                $spreadsheet->getActiveSheet()->setCellValue('I' . 10, $data->iar_fundcluster);
                $spreadsheet->getActiveSheet()->setCellValue('C' . 11, $data->iar_supplier);
                $spreadsheet->getActiveSheet()->setCellValue('E' . 12, $data->iar_Podate);
                $spreadsheet->getActiveSheet()->setCellValue('E' . 13, $data->iar_rod);
                $spreadsheet->getActiveSheet()->setCellValue('E' . 14, $data->iar_rcc);
                $spreadsheet->getActiveSheet()->setCellValue('I' . 11, $data->iar_number);
                $spreadsheet->getActiveSheet()->setCellValue('I' . 12, $data->iar_date);
                $spreadsheet->getActiveSheet()->setCellValue('I' . 13, $data->iar_invoice);
                $spreadsheet->getActiveSheet()->setCellValue('I' . 14, $data->iar_invoice_d);
            

            $row = 18; 
            foreach ($itemss as $item) {
                $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $item->item_name);
                $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $item->item_unit);
                $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $item->item_quantity);
                $row++;
            }
        }
            return view('admin.iar.view-iar', ['spreadsheet' => $spreadsheet]);
        } catch (\Exception $e) {
            Log::error('Exception in ExportExc view method: ' . $e->getMessage());
            throw $e; // Re-throw the exception to halt execution
        }
    }
    

    public function headings(): array
    {
        return [
            'iar_entityname',
            'iar_fundcluster',
            'iar_supplier',
            'iar_Podate',
            'iar_rod',
            'iar_rcc',
            'iar_number',
            'iar_date',
            'iar_invoice',
            'iar_invoice_d',
            'item_name',
            'item_unit',
            'item_quantity'
        ];
    }
    public function export()
    {
        try {
            $data = Iar::find($this->rowId);
            $spreadsheet = $this->view()->getData()['spreadsheet'];
            $writer = new Xlsx($spreadsheet);
            ob_start();
            $writer->save('php://output');
            $content = ob_get_contents();
            ob_end_clean();
    
            // Log the download
            Log::info('IAR download', ['iar_id' => $data->iar_id, 'user_id' => auth()->id(), 'timestamp' => now()]);
    
            return response()->make($content, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="IAR_' . $data->iar_number . '.xlsx"',
                'Content-Transfer-Encoding' => 'binary',
                'Expires' => 0,
                'Cache-Control' => 'must-revalidate',
                'Pragma' => 'public',
            ])->send();
        } catch (\Exception $e) {
            Log::error('Exception in ExportExc export method: ' . $e->getMessage());
            throw $e; // Re-throw the exception to halt execution
        }
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
