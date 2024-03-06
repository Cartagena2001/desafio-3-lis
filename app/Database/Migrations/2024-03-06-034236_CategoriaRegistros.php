<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriaRegistros extends Migration
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
            'categoria_registro' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('categoria_registros');
    }

    public function down()
    {
        $this->forge->dropTable('categoria_registros');
    }
}
