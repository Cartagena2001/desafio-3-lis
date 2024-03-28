<?php

namespace App\Controllers\reports;

use App\Controllers\BaseController;
use App\Models\RegistroModel;
use App\Controllers\PdfController;

use Dompdf\Dompdf;
use Dompdf\Options;

class PieChartController extends BaseController
{
    public function index()
    {
        return view('partials/pie-chart');
    }

    public function screen()
    {
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        $reports_html = view('partials/reports');
        $pie_chart_html = view('partials/pie-chart-pdf');

        $html = $reports_html . $pie_chart_html;

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reports.pdf', array('Attachment' => 0));
    }

    public function initPieChart()
    {
        $response = [];

        $registroModel = new RegistroModel();
        $registro = $registroModel->select('tipo_registros.tipo_registro, registro.monto')
            ->join('tipo_registros', 'tipo_registros.id = registro.id_tipo_registro')
            ->findAll();

        $response['status'] = 200;
        $response['message'] = 'Registros obtenidos';
        $response['data'] = $registro;
        return $this->response->setJSON($response);
    }

    public function pieChartPDF()
    {
        $html = view('partials/pie-chart');
        $data['html'] = $html;
        return view('partials/pie-chart-pdf', ['html' => $html]);
    }
}
