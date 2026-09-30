<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at', 'is_archived'];
    protected $useTimestamps = false;

    public function forDate(string $date): array
    {
        return $this->where('task_date', $date)->where('is_archived', 0)->orderBy('id', 'ASC')->findAll();
    }

    public function allByDate(): array
    {
        return $this->where('is_archived', 0)->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();
    }
}
