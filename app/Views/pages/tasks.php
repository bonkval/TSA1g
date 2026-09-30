<?= view('partials/header', ['title' => $title]) ?>
<h1>All Tasks</h1>
<p>Every assignment, ordered by scheduled date.</p>
<?php $successMessage = session()->getFlashdata('success'); if ($successMessage): ?><p class="notice success"><?= esc($successMessage) ?></p><?php endif; ?>
<section class="content-panel" aria-label="All tasks">
    <?= view('partials/task_table', ['tasks' => $tasks]) ?>
</section>
<?= view('partials/footer') ?>
