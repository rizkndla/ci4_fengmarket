<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageStatusToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'description',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['image', 'status']);
    }
}
