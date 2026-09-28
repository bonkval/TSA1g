<?php if ($tasks === []): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <table>
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Task date</th></tr></thead>
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
