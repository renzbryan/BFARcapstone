<?php

namespace App\Http\Controllers;
use App\Exports\ExportExc; // Your export class that handles the Excel to PDF process
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class PDFcontroller extends Controller
{
    public function exportPdf($id)
    {
        try {
            // Get the current year
            $year = date('Y');
    
            // Create a path for storing PDFs based on the year
            $directoryPath = storage_path('app/public/IAR/' . $year);
            
            // Check if the year folder exists, create it if not
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0755, true);
            }
    
            // Initialize the ExportExc class and pass the row ID
            $export = new ExportExc($id);
    
            // Generate spreadsheet with data
            $spreadsheet = $export->view()->getData()['spreadsheet'];
    
            // Get the active sheet
            $sheet = $spreadsheet->getActiveSheet();
    
            // Set paper size to A4
            $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
            
            // Set fit to page options to ensure it fits in one page
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(1);
            $sheet->getPageSetup()->setFitToHeight(0); // Set to 0 to fit to one page height
    
            // Set the filename based on the ID
            $filePath = $directoryPath . '/IAR_' . $id . '.pdf';
    
            // Check if the file already exists, if yes, delete it to replace with the new one
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the existing file
            }
    
            // Use Dompdf to generate and save the PDF
            $pdfWriter = new Dompdf($spreadsheet);
            
            // Save the PDF
            $pdfWriter->save($filePath);
    
            // Return the PDF for inline viewing in the browser
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
            ]);
    
        } catch (\Exception $e) {
            Log::error('Error generating PDF: ' . $e->getMessage());
            return back()->with('error', 'Error generating PDF: ' . $e->getMessage());
        }
    }
    
}
