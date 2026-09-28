<?= view('partials/header', ['title' => $title]) ?>
<h1>Profile</h1>
<section class="content-panel" aria-label="Demo user profile">
<?php if ($user !== null): ?>
    <dl>
        <dt>Username</dt><dd><?= esc($user['username']) ?></dd>
        <dt>Full name</dt><dd><?= esc($user['full_name']) ?></dd>
        <dt>Email</dt><dd><?= esc($user['email']) ?></dd>
        <dt>Joined</dt><dd><?= esc($user['created_at']) ?></dd>
    </dl>
<?php else: ?>
    <p>No demo user found. Run the database seeder.</p>
<?php endif; ?>
</section>
<?= view('partials/footer') ?>
