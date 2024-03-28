<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function generatePDF()
    {
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        $reports_html = view('partials/reports');
        $pie_chart_html = view('partials/pie-chart');

        $html = $reports_html . $pie_chart_html;

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reports.pdf', array('Attachment' => 0));
    }
}
