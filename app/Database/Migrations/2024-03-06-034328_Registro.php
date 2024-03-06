<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Registro extends Migration
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
            'monto' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'fecha' => [
                'type' => 'DATE'
            ],
            'factura' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_categoria_registro' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'id_tipo_registro' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id');
        $this->forge->addForeignKey('id_categoria_registro', 'categoria_registros', 'id');
        $this->forge->addForeignKey('id_tipo_registro', 'tipo_registros', 'id');
        $this->forge->createTable('registro');
    }

    public function down()
    {
        $this->forge->dropTable('registro');
    }
}
