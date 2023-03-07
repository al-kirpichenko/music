<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>
<main class="content">
    <div class="text-center">
        <h2>Добавить категорию</h2>

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

        <form action="<?= base_url()?>/admin/create-category" method="post" class="register-form">
            <div class="mb-3">
                <label for="name" class="form-label">Наименование</label>
                <input type="text" name="name" class="form-control" id="name"
                       value="" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Сохранить</button>
        </form>
</main>
<?= $this->endSection() ?>
