<?= view('partials/header', ['title' => $title]) ?>
<h1>Log In</h1>
<p>Log in to create and manage tasks.</p>
<section class="content-panel" aria-label="Login form">
    <?php if (session()->getFlashdata('error')): ?><p class="notice error" role="alert"><?= esc(session()->getFlashdata('error')) ?></p><?php endif; ?>
    <?php foreach ((array) session()->getFlashdata('errors') as $error): ?><p class="notice error" role="alert"><?= esc($error) ?></p><?php endforeach; ?>
    <form class="task-form" action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <label>Username<input name="username" required maxlength="50" value="<?= esc(old('username')) ?>" autocomplete="username"></label>
        <label>Password<input type="password" name="password" required autocomplete="current-password"></label>
        <button type="submit">Log In</button>
    </form>
</section>
<?= view('partials/footer') ?>
