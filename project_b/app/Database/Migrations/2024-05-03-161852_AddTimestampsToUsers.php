<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at TIMESTAMP NULL',
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'created_at');
        $this->forge->dropColumn('users', 'updated_at');
        $this->forge->dropColumn('users', 'deleted_at');
    }
}
