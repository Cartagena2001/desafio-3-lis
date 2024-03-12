<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegistroModel;

class RegistroController extends BaseController
{
    public function index()
    {
        //
    }

    public function getRegistros()
    {
        $response = [];
        if (!$this->request->isAJAX()) {
            $response['status'] = 500;
            $response['message'] = 'No se puede procesar la solicitud';
            return $this->response->setJSON($response);
        }

        $registroModel = new RegistroModel();
        $registro = $registroModel->select('registro.id as id_registro , registro.monto, registro.fecha, registro.factura, categoria_registros.categoria_registro, tipo_registros.tipo_registro, usuarios.nombre_completo')->join('categoria_registros', 'categoria_registros.id = registro.id_categoria_registro')->join('tipo_registros', 'tipo_registros.id = registro.id_tipo_registro')->join('usuarios', 'usuarios.id = registro.id_usuario')->findAll();

        $response['status'] = 200;
        $response['message'] = 'Registros obtenidos';
        $response['data'] = $registro;
        return $this->response->setJSON($response);
    }

    public function storeRegistro()
    {
        $response = [];
        if (!$this->request->isAJAX()) {
            $response['status'] = 500;
            $response['message'] = 'No se puede procesar la solicitud';
            return $this->response->setJSON($response);
        }

        $registroModel = new RegistroModel();

        $rules = [
            "monto" => [
                "label" => "Monto",
                "rules" => "required",
                "errors" => [
                    "required" => "El campo {field} es obligatorio.",
                ],
            ],
            "fecha" => [
                "label" => "Fecha",
                "rules" => "required",
                "errors" => [
                    "required" => "El campo {field} es obligatorio.",
                ],
            ],
            "factura" => [
                "label" => "Factura",
                "rules" => "uploaded[factura]|mime_in[factura,image/jpg,image/jpeg,image/png,application/pdf]|max_size[factura,10240]",
                "errors" => [
                    "uploaded" => "El campo {field} es obligatorio.",
                    "mime_in" => "El archivo adjunto debe ser una imagen en formato JPG, JPEG o PNG.",
                    "max_size" => "El tamaño máximo del archivo adjunto es de 1MB.",
                ],
            ],
            "categoria" => [
                "label" => "Categoria",
                "rules" => "required",
                "errors" => [
                    "required" => "El campo {field} es obligatorio.",
                ],
            ],
            "tipo" => [
                "label" => "Tipo",
                "rules" => "required",
                "errors" => [
                    "required" => "El campo {field} es obligatorio.",
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->response->setStatusCode(400)->setJSON(['errors' => $this->validator->getErrors()]);
        }


        $registro = [
            'monto' => $this->request->getPost('monto'),
            'fecha' => $this->request->getPost('fecha'),
            'id_categoria_registro' => $this->request->getPost('categoria') == null ? null : $this->request->getPost('categoria'),
            'id_tipo_registro' => $this->request->getPost('tipo') == null ? null : $this->request->getPost('tipo'),
            'id_usuario' => session()->get('id')
        ];

        // var_dump($registro);
        // die();

        $image = $this->request->getFile('factura');
        if (!$image == null && !$image->hasMoved()) {
            $new_image_name = $image->getName();
            $image->move('./assets/media/facturas/', $new_image_name);

            if ($image->hasMoved()) {
                $registro['factura'] = $new_image_name;
            }
        } else {
            $registro['factura'] = null;
        }

        $registroModel->insert($registro);
        $response['status'] = 200;
        $response['message'] = 'Registro almacenado';
        return $this->response->setJSON($response);
    }
}
