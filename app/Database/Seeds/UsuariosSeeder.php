<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre_completo' => 'admin',
            'correo'    => 'admin@gmail.com',
            'contra'    => password_hash('admin2024', PASSWORD_DEFAULT),
            'telefono'  => '1234567890',
            'direccion'       => 'Calle 123',
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
