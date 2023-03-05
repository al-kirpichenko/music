<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Добавить категорию</h2>

        <form action="/admin/save-category" method="post" class="register-form">
            <div class="mb-3">
                <label for="name" class="form-label">Наименование</label>
                <input type="text" name="name" class="form-control" id="name"
                       value="" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Сохранить</button>
        </form>
</main>
<?= $this->endSection() ?>
