<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDueTimeToTasks extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tasks', [
            'due_time' => ['type' => 'TIME', 'null' => true],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tasks', 'due_time');
    }
}
