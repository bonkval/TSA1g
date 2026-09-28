<?php if ($tasks === []): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <table class="task-table">
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Task date</th><th scope="col">Due time</th></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= $task['due_time'] !== null ? esc(date('g:i A', strtotime($task['due_time']))) : '—' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
