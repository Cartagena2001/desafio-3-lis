<?php
 
namespace App\Controllers\reports;
use App\Controllers\BaseController;
use App\Models\RegistroModel;


class PieChartController extends BaseController
{
    public function index() {
        return view('partials/pie-chart');
    }
    
    public function initPieChart() {
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
    
}