<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'categoria_registro' => 'Comida',
        ];

        $this->db->table('categoria_registros')->insert($data);

        $data = [
            'categoria_registro' => 'Transporte',
        ];

        $this->db->table('categoria_registros')->insert($data);

        $data = [
            'categoria_registro' => 'Entretenimiento',
        ];

        $this->db->table('categoria_registros')->insert($data);

        $data = [
            'categoria_registro' => 'Salud',
        ];

        $this->db->table('categoria_registros')->insert($data);

        $data = [
            'categoria_registro' => 'Educacion',
        ];

        $this->db->table('categoria_registros')->insert($data);

        $data = [
            'categoria_registro' => 'Otros',
        ];

        $this->db->table('categoria_registros')->insert($data);

    }
}
