<?= view('partials/header', ['title' => $title]) ?>
<h1>Tasks for Today</h1>
<p>Assignments grouped by scheduled date.</p>
<?php if ($taskGroups === []): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <?php foreach ($taskGroups as $date => $tasks): ?>
        <section class="date-group" aria-label="Tasks scheduled for <?= esc($date) ?>">
            <h2>Tasks scheduled for <?= esc($date) ?><?= $date === $today ? ' · Today' : '' ?></h2>
            <?= view('partials/task_table', ['tasks' => $tasks]) ?>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
<?= view('partials/footer') ?>
