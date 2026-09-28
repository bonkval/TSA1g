<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveDueTimeFromTasks extends Migration
{
    public function up()
    {
        if ($this->db->fieldExists('due_time', 'tasks')) {
            $this->forge->dropColumn('tasks', 'due_time');
        }
    }

    public function down()
    {
        $this->forge->addColumn('tasks', [
            'due_time' => ['type' => 'TIME', 'null' => true],
        ]);
    }
}
