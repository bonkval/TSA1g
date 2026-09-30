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

        $taskGroups = [];
        foreach ((new TaskModel())->allByDate() as $task) {
            $taskGroups[$task['task_date']][] = $task;
        }

        return view('pages/welcome', [
            'title' => 'Welcome',
            'today' => $today,
            'taskGroups' => $taskGroups,
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

    public function login(): string
    {
        return view('pages/login', ['title' => 'Log In']);
    }

    public function attemptLogin()
    {
        $rules = ['username' => 'required|max_length[50]', 'password' => 'required'];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $user = (new UserModel())->byUsername((string) $this->request->getPost('username'));
        if ($user === null || $user['password'] === '' || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'The username or password is incorrect.');
        }
        session()->regenerate();
        session()->set(['user_id' => $user['id'], 'username' => $user['username']]);
        return redirect()->to(site_url('tasks'));
    }

    public function logout()
    {
        session()->remove(['user_id', 'username']);
        session()->regenerate(true);
        return redirect()->to(site_url('/'));
    }

    public function newTask(): string
    {
        return view('pages/task_form', ['title' => 'New Task', 'task' => null]);
    }

    public function createTask()
    {
        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]', 'status' => 'required|in_list[pending,completed]'];
        if (! $this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        (new TaskModel())->insert(['title' => trim((string) $this->request->getPost('title')), 'task_date' => $this->request->getPost('task_date'), 'status' => $this->request->getPost('status'), 'created_at' => date('Y-m-d H:i:s')]);
        return redirect()->to(site_url('tasks'))->with('success', 'Task created.');
    }

    public function editTask(int $id): string
    {
        $task = (new TaskModel())->where('is_archived', 0)->find($id);
        if ($task === null) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        return view('pages/task_form', ['title' => 'Edit Task', 'task' => $task]);
    }

    public function updateTask(int $id)
    {
        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]', 'status' => 'required|in_list[pending,completed]'];
        if (! $this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        $model = new TaskModel();
        if ($model->where('is_archived', 0)->find($id) === null) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $model->update($id, ['title' => trim((string) $this->request->getPost('title')), 'task_date' => $this->request->getPost('task_date'), 'status' => $this->request->getPost('status')]);
        return redirect()->to(site_url('tasks'))->with('success', 'Task updated.');
    }

    public function archiveTask(int $id)
    {
        $model = new TaskModel();
        if ($model->where('is_archived', 0)->find($id) === null) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $model->update($id, ['is_archived' => 1]);
        return redirect()->to(site_url('tasks'))->with('success', 'Task archived.');
    }
}
