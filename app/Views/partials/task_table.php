<?php if ($tasks === []): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <table class="task-table">
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Due Date</th><?php if (session()->get('user_id')): ?><th scope="col">Actions</th><?php endif; ?></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <?php if (session()->get('user_id')): ?><td class="actions"><a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a><form action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>" method="post"><?= csrf_field() ?><button class="text-button" type="submit">Archive</button></form></td><?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
