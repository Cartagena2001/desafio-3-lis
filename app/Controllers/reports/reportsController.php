<?php

namespace App\Controllers\reports;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegistroModel;
use App\Controllers\PdfController; 


class ReportsController extends BaseController
{

    public function index()
    {
        $entradas = $this->getEntradas();
        $salidas = $this->getSalidas();
        $data = [
            'entradas' => $entradas['data'],
            'totalEntradas' => $entradas['total'],
            'salidas' => $salidas['data'],
            'totalSalidas' => $salidas['total']
        ];
         
        return view('reports/reports', $data);
    }



    public function pdfView()
    {
        $entradas = $this->getEntradas();
        $salidas = $this->getSalidas();

        $data = [
            'entradas' => $entradas['data'],
            'totalEntradas' => $entradas['total'],
            'salidas' => $salidas['data'],
            'totalSalidas' => $salidas['total'],
            ];
        
        $pdfController = new PdfController();
        $pdfController->generatePDF($data);
    }

    public function pieView()
    {
            $html = view('partials/pie-chart');
            $data['html'] = $html;
            return view('partials/pie-chart-pdf', $data);
    }

    public function getDataPie(){
        $registroModel = new RegistroModel();
        $registro = $registroModel->select('tipo_registros.tipo_registro, registro.monto')
            ->join('tipo_registros', 'tipo_registros.id = registro.id_tipo_registro')
            ->findAll();
           return [
                'data' => $registro,
            ];
    }

    public function getEntradas()
    {
        $registroModel = new RegistroModel();
        $entradas = $registroModel
            ->select('categoria_registros.categoria_registro, registro.monto')
            ->join('categoria_registros', 'categoria_registros.id = registro.id_categoria_registro')
            ->join('tipo_registros', 'tipo_registros.id = registro.id_tipo_registro')
            ->join('usuarios', 'usuarios.id = registro.id_usuario')
            ->where('tipo_registros.tipo_registro', 'Entrada')
            ->findAll();

        $totalEntradas = array_sum(array_column($entradas, 'monto'));

        return [
            'data' => $entradas,
            'total' => $totalEntradas
        ];
    }

    public function getSalidas()
    {
        $registroModel = new RegistroModel();
        $salidas = $registroModel
            ->select('categoria_registros.categoria_registro, registro.monto')
            ->join('categoria_registros', 'categoria_registros.id = registro.id_categoria_registro')
            ->join('tipo_registros', 'tipo_registros.id = registro.id_tipo_registro')
            ->join('usuarios', 'usuarios.id = registro.id_usuario')
            ->where('tipo_registros.tipo_registro', 'Salida')
            ->findAll();

        $totalSalidas = array_sum(array_column($salidas, 'monto'));

        return [
            'data' => $salidas,
            'total' => $totalSalidas
        ];
    }
}
