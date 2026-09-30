<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="site-header-inner">
            <p class="site-name">Tasks for Today</p>
            <nav aria-label="Main navigation">
                <a href="<?= site_url('/') ?>">Welcome</a>
                <a href="<?= site_url('tasks') ?>">Task List</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>
                <?php if (session()->get('user_id')): ?>
                    <a href="<?= site_url('tasks/new') ?>">New Task</a>
                    <form class="nav-form" action="<?= site_url('logout') ?>" method="post"><?= csrf_field() ?><button class="nav-button" type="submit">Log Out</button></form>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>">Log In</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main>
