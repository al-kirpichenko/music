<?= $this->extend("layouts/layout") ?>

<?= $this->section("content") ?>
    <main class="content">
        <div class="text-center">
            <h2>Авторизация</h2>
        </div>
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="/login/auth" method="post" class="register-form">
            <div class="mb-3">
                <label for="InputForLogin" class="form-label">Имя пользователя</label>
                <input type="text" name="login" class="form-control" id="InputForLogin"
                       value="<?= set_value('login') ?>">
            </div>
            <div class="mb-3">
                <label for="InputForPassword" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="InputForPassword">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </main>

<?= $this->endSection() ?>