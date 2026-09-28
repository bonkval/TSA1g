<?php if ($tasks === []): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <table class="task-table">
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Due Date</th></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
