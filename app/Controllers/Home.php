<?php

namespace App\Controllers;

use App\Models\CategoriaRegistroModel;
use App\Models\TipoRegistroModel;

class Home extends BaseController
{
    public function index(): string
    {
        $categoriaRegistroModel = new CategoriaRegistroModel();
        $categorias = $categoriaRegistroModel->findAll();

        $tipoRegistroModel = new TipoRegistroModel();
        $tipos = $tipoRegistroModel->findAll();

        $data = [
            'categorias' => $categorias,
            'tipos' => $tipos,
        ];

        return view('dashboard/index', $data);
    }
}
