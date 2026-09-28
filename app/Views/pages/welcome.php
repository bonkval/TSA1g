<?= view('partials/header', ['title' => $title]) ?>
<h1>Tasks for Today</h1>
<p>Tasks scheduled for <?= esc($today) ?>.</p>
<?= view('partials/task_table', ['tasks' => $tasks]) ?>
<?= view('partials/footer') ?>
