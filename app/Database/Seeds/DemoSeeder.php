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
        $createdAt = $now->format('Y-m-d H:i:s');

        $userCount = $users->countAllResults();
        if ($userCount > 1) {
            throw new RuntimeException('The users table must contain exactly one demo user.');
        }

        $taskRows = [
            ['Networking 2: SW 2', 'completed', '2026-09-29'],
            ['Networking 2: Formative 2', 'completed', '2026-09-29'],
            ['Networking 2: Technical Assessment 4', 'completed', '2026-09-29'],
            ['Networking 2: Technical Assessment 5', 'completed', '2026-09-29'],
            ['Networking 2: AI-Assisted Module 4-5', 'completed', '2026-09-29'],
            ['IT0049: TSA1', 'pending', '2026-09-30'],
            ['IT0037: Title Proposal', 'pending', '2026-10-05'],
            ['IT0035: Summative Assessment 1', 'pending', '2026-09-29'],
            ['Networking 2: Summative Assessment 2', 'pending', '2026-10-01'],
            ['Networking 2: CCST', 'pending', '2026-10-05'],
        ];

        $this->db->transBegin();
        try {
            $tasks->emptyTable();
            $tasks->insertBatch(array_map(
                static fn (array $row): array => [
                    'title' => $row[0],
                    'status' => $row[1],
                    'task_date' => $row[2],
                    'created_at' => $createdAt,
                ],
                $taskRows
            ));

            $profile = [
                'username' => 'MrDemoGuy',
                'full_name' => 'Demo Guy',
                'email' => 'cedrickvales1111@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
            ];
            if ($userCount === 0) {
                $users->insert($profile + ['created_at' => $createdAt]);
            } else {
                $user = $users->get()->getRowArray();
                $users->where('id', $user['id'])->update($profile);
            }

            if ($this->db->transStatus() === false) {
                throw new RuntimeException('Unable to update the demo records.');
            }
            $this->db->transCommit();
        } catch (\Throwable $error) {
            $this->db->transRollback();
            throw $error;
        }
    }
}
