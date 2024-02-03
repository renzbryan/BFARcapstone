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
use App\Models\Inventory;

class ExportExc implements WithHeadings, FromView
{
    protected $rowId;

    public function __construct($rowId)
    {
        $this->rowId = $rowId;
    }

    public function view(): View
    {
        $spreadsheet = IOFactory::load(storage_path('app/IAR.xlsx'));
        $data = Inventory::findOrFail($this->rowId);
        $item = Iar::where( $this->rowId, '=', 'iar_id')->all();
        $row = 18; 
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
        foreach ($item as $item) {
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $item->item_name);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $item->item_unit);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $item->item_quantity);
            $row++;
        }
        return view('admin.iar.view-iar', ['spreadsheet' => $spreadsheet]);
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
