<?php
/**
 * $data array holds the $user value
 * @see \App\Controllers\Admin::addProduct()
 * @var Category $category
 * @var array $categories
 */

use App\Entities\Category;

?>
<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Добавить товар</h2>

        <!-- flashdata for success -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <b><?php echo session()->getFlashdata('success') ?></b>
            </div>
        <?php endif ?>
        <!-- flashdata for errors -->
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors')  as $field => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= base_url()?>/admin/save-product" method="post" class="register-form">
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
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach ?>
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