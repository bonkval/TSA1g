<?= view('partials/header', ['title' => $title]) ?>
<h1>All Tasks</h1>
<?= view('partials/task_table', ['tasks' => $tasks]) ?>
<?= view('partials/footer') ?>
