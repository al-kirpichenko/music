<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
    <main class="content">
        <div class="text-center">
            <h2>Регистрация</h2>
        </div>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form action="/register/save" method="post" class="register-form">
            <div class="mb-3">
                <label for="InputName" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" id="InputName"
                       value="<?= set_value('name') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputSurname" class="form-label">Фамилия</label>
                <input type="text" name="surname" class="form-control" id="InputSurname"
                       value="<?= set_value('surname') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputPatronymic" class="form-label">Отчество</label>
                <input type="text" name="patronymic" class="form-control" id="InputPatronymic"
                       value="<?= set_value('patronymic') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputLogin" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="InputLogin"
                       value="<?= set_value('login') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="InputEmail"
                       value="<?= set_value('email') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="InputPassword"
                       value="<?= set_value('password') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputPasswordRepeat" class="form-label">Повтор пароля</label>
                <input type="password" name="password_repeat" class="form-control" id="InputPasswordRepeat"
                       value="<?= set_value('password_repeat') ?>" required>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Примите условия и соглашения
                    </label>
                    <div class="invalid-feedback">
                        Вы должны принять перед отправкой.
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

    </main>
<?= $this->endSection() ?>
