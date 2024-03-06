<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nombre_completo' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'contra' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
