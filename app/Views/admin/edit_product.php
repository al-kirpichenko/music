<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Редактировать товар</h2>

        <form action="/admin/save-product" method="post" class="register-form">
            <div class="mb-3">
                <label for="name" class="form-label">Наименование</label>
                <input type="text" name="name" class="form-control" id="name"
                       value="" required>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Цена</label>
                <input type="number" name="surname" class="form-control" id="cost"
                       value="" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select name="category" class="form-control" id="category"
                        required>
                    <option value="1">Струнные</option>
                    <option value="2">Клавишные</option>
                    <option value="3">Ударные</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control" id="image"
                       value="" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Характеристики</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Сохранить</button>
        </form>
</main>
<?= $this->endSection() ?>
