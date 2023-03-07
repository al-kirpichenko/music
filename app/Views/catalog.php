<?php
/**
 * $data array holds the $user value
 * @see \App\Controllers\Catalog::index()
 * @var Product $product
 * @var array $products
 */
use App\Entities\Product;

?>
<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Каталог</h2>
    </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 catalog">
            <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card ma h-100">
                    <img src="/images/<?= $product->image ?>" class="card-img-top "  alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->name ?></h5>
                        <p class="card-text"><?= $product->description ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><?= $product->cost ?> руб.</small>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
</main>
<?= $this->endSection() ?>
