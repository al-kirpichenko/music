<?php
/**
* $data array holds the $user value
* @see \App\Controllers\Admin::categories()
* @var Category $category
* @var array $categories
*/

use App\Entities\Category;

?>
<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Администрирование</h2>
        <h5>Управление категориями товаров</h5>
        <a class="btn btn-success" href="<?= base_url()?>admin/add-category" role="button"><i class="bi bi-pen"></i> Добавить категорию</a>
    </div>
    <div class="catalog products-table">
        <table class="table">
            <thead>
            <th scope="col">ID</th>
            <th scope="col">Название категории</th>
            <th scope="col">Действия</th>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <th scope="row"><?= $category->id ?></th>
                <td><?= $category->name ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url()?>admin/edit-category/<?= $category->id?>" role="button"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-primary" href="<?= base_url()?>admin/remove-category/<?= $category->id?>" role="button"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection() ?>
