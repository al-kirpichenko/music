<?php
/**
 * $data array holds the $user value
 * @see \App\Controllers\Admin::products()
 * @var Product $product
 * @var array $products
 */

use App\Entities\Product;
?>

<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Администрирование</h2>
        <h5>Управление товарами</h5>
        <a class="btn btn-success" href="<?= base_url()?>admin/add-product" role="button"><i class="bi bi-pen"></i> Добавить товар</a>

    </div>
    <div class="catalog products-table">
        <table class="table">
            <thead>
            <th scope="col">ID</th>
            <th scope="col">Наименование</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <th scope="row"><?= $product->id ?></th>
                <td><?= $product->name ?></td>
                <td><?= $product->cost ?></td>
                <td>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection() ?>