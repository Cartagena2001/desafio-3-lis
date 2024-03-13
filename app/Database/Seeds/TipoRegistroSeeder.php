<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoRegistroSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'tipo_registro' => 'Salida',
        ];

        $this->db->table('tipo_registros')->insert($data);

        $data = [
            'tipo_registro' => 'Entrada',
        ];

        $this->db->table('tipo_registros')->insert($data);
    }
}
