<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function makePDF()
    {
        $file_name = 'reports.pdf';
        $html = '<link rel="stylesheet" href="bootstrap.min.css">';
        $html .= $_POST["hidden_html"];

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($file_name, array('Attachment' => 0));
    }
}
