<?= view('partials/header', ['title' => $title]) ?>
<h1><?= esc($title) ?></h1>
<?php foreach ((array) session()->getFlashdata('errors') as $error): ?><p class="notice error" role="alert"><?= esc($error) ?></p><?php endforeach; ?>
<section class="content-panel" aria-label="Task details">
    <form class="task-form" action="<?= $task === null ? site_url('tasks') : site_url('tasks/' . $task['id']) ?>" method="post">
        <?= csrf_field() ?>
        <label>Title<input name="title" required maxlength="150" value="<?= esc(old('title', $task['title'] ?? '')) ?>"></label>
        <label>Task date<input type="date" name="task_date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>"></label>
        <label>Status<select name="status" required><option value="pending" <?= old('status', $task['status'] ?? 'pending') === 'pending' ? 'selected' : '' ?>>Pending</option><option value="completed" <?= old('status', $task['status'] ?? '') === 'completed' ? 'selected' : '' ?>>Completed</option></select></label>
        <button type="submit">Save Task</button>
    </form>
</section>
<?= view('partials/footer') ?>
