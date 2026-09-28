<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use DateTimeImmutable;
use DateTimeZone;
use RuntimeException;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $tasks = $this->db->table('tasks');
        $users = $this->db->table('users');
        $now = new DateTimeImmutable('now', new DateTimeZone(config('App')->appTimezone));
        $today = $now->format('Y-m-d');
        $createdAt = $now->format('Y-m-d H:i:s');

        if ($tasks->countAllResults() === 0) {
            $tasks->insertBatch([
                ['title' => 'Review yesterday\'s progress', 'status' => 'completed', 'task_date' => $now->modify('-1 day')->format('Y-m-d'), 'created_at' => $createdAt],
                ['title' => 'Prepare team meeting notes', 'status' => 'completed', 'task_date' => $now->modify('-1 day')->format('Y-m-d'), 'created_at' => $createdAt],
                ['title' => 'Check project inbox', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
                ['title' => 'Attend daily team meeting', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
                ['title' => 'Update task tracker', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
                ['title' => 'Review open requests', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
                ['title' => 'Draft weekly report', 'status' => 'pending', 'task_date' => $now->modify('+1 day')->format('Y-m-d'), 'created_at' => $createdAt],
                ['title' => 'Plan next sprint', 'status' => 'pending', 'task_date' => $now->modify('+1 day')->format('Y-m-d'), 'created_at' => $createdAt],
            ]);
        }

        $userCount = $users->countAllResults();
        if ($userCount > 1) {
            throw new RuntimeException('The users table must contain exactly one demo user.');
        }
        if ($userCount === 0) {
            $users->insert([
                'username' => 'demo_user',
                'full_name' => 'Alex Morgan',
                'email' => 'alex.morgan@example.com',
                'created_at' => $createdAt,
            ]);
        }
    }
}
