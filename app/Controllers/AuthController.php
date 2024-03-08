<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class AuthController extends BaseController
{
    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function index(): string | object
    {
        if ($this->session->isLoggedIn) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function login(): object
    {
        $response = [];
        if (!$this->request->isAJAX()) {
            $response['status'] = 500;
            $response['message'] = 'No se puede procesar la solicitud';
            return $this->response->setJSON($response);
        }

        $rules = [
            'correo' => 'required|valid_email',
            'contra' => 'required|min_length[8]|max_length[20]'
        ];

        $errors = [
            'correo' => [
                'required' => 'El correo electrónico es requerido',
                'valid_email' => 'El correo electrónico no es válido'
            ],
            'contra' => [
                'required' => 'La contraseña es requerida',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                'max_length' => 'La contraseña debe tener máximo 20 caracteres'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            $response['status'] = 500;
            $response['success'] = false;
            $response['message'] = 'No se puede procesar la solicitud';
            $response['errors'] = $this->validator->getErrors();
            return $this->response->setJSON($response);
        }

        $correo = $this->request->getPost('correo');
        $contra = $this->request->getPost('contra');

        $usuario = $this->usuariosModel->where('correo', $correo)->first();

        if (!$usuario) {
            $response['status'] = 500;
            $response['success'] = false;
            $response['message'] = 'El correo electrónico o la contraseña son incorrectos';
            $response['errors'] = ['correo' => 'El correo electrónico no existe'];
            return $this->response->setJSON($response);
        }

        $contraverify = password_verify($contra, $usuario['contra']);

        if (!$contraverify) {
            $response['status'] = 500;
            $response['success'] = false;
            $response['message'] = 'No se puede procesar la solicitud';
            $response['errors'] = ['contra' => 'La contraseña es incorrecta'];
            return $this->response->setJSON($response);
        }

        $sessionData = [
            'id' => $usuario['id'],
            'nombre_completo' => $usuario['nombre_completo'],
            'correo' => $usuario['correo'],
            'isLoggedIn' => true
        ];

        $this->session->set($sessionData);
        // var_dump($this->session);

        $response['status'] = 200;
        $response['success'] = true;
        $response['message'] = 'Inicio de sesión exitoso';

        return $this->response->setJSON($response);
    }

    public function logout(): object
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
