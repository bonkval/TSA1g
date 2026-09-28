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
            </nav>
        </div>
    </header>
    <main>
