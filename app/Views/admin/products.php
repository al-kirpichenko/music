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
            <tr>
                <th scope="row">1</th>
                <td>Гитара</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Гитара</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Гитара</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-primary" href="#" role="button"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection() ?>