<?php

namespace App\Http\Controllers;
use App\Exports\ExportExc;

class PDFcontroller extends Controller
{
    public function exportPdf($id)
    {
        // Create an instance of ExportExc with the rowId
        $export = new ExportExc($id);
        
        // Call the exportPdf method from the ExportExc class
        return $export->exportPdf();
    }

}
