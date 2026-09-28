<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use DateTimeImmutable;
use DateTimeZone;

class Pages extends BaseController
{
    public function welcome(): string
    {
        $today = (new DateTimeImmutable('now', new DateTimeZone(config('App')->appTimezone)))
            ->format('Y-m-d');

        return view('pages/welcome', [
            'title' => 'Welcome',
            'today' => $today,
            'tasks' => (new TaskModel())->forDate($today),
        ]);
    }

    public function tasks(): string
    {
        return view('pages/tasks', [
            'title' => 'Task List',
            'tasks' => (new TaskModel())->allByDate(),
        ]);
    }

    public function profile(): string
    {
        return view('pages/profile', [
            'title' => 'Profile',
            'user'  => (new UserModel())->demoUser(),
        ]);
    }

    public function about(): string
    {
        return view('pages/about', ['title' => 'About']);
    }
}
