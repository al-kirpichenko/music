<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        <div class="bd-brand-item w-100">
            <div class="h3 link-light margin-0">Music House</div>
            <strong class="text-success logo-10">Музыкальные инструменты</strong>
        </div>
    </a>
    <ul class="nav nav-pills">
        <?php if (str_contains(uri_string(), 'admin')): ?>
        <li class="nav-item">
            <a href="/catalog" class="btn me-2 btn-login">Главная</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url()?>admin/products" class="btn me-2
                <?= uri_string() === 'products' ? 'btn-login-active' : 'btn-login'?>">Товары
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url()?>admin/categories" class="btn btn-login me-2
                <?= uri_string() === 'categories' ? 'btn-login-active' : 'btn-login'?>">Категории
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url()?>admin/orders" class="btn btn-login me-2
                <?= uri_string() === 'orders' ? 'btn-login-active' : 'btn-login'?>">Заказы
            </a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a href="/about" class="btn me-2
                <?= uri_string() === 'about' ? 'btn-login-active' : 'btn-login'?>">О нас
            </a>
        </li>
        <li class="nav-item">
            <a href="/catalog" class="btn btn-login me-2
                <?= uri_string() === 'catalog' ? 'btn-login-active' : 'btn-login'?>">Каталог
            </a>
        </li>
        <li class="nav-item">
            <a href="/map" class="btn btn-login me-2
                <?= uri_string() === 'map' ? 'btn-login-active' : 'btn-login'?>">Где нас найти?
            </a>
        </li>
        <?php if ((session()->get('user_group') === '2' )): ?>
            <li class="nav-item">
                <a href="/admin/products" class="btn btn-login me-2
                <?= uri_string() === 'map' ? 'btn-login-active' : 'btn-login'?>">Администрирование
                </a>
            </li>
        <?php endif ?>
    <?php endif ?>
    </ul>

    <div class="col-md-3 text-end margin-right-10">
        <?php if(session()->get('loggedIn')): ?>
         <span class="link-light"><?= session()->get('name')?></span>
            <a href="/logout" class="btn btn-login me-2">Выйти</a>
        <?php else: ?>
            <a href="/login" class="btn btn-login me-2">Вход</a>
            <a href="/register" class="btn btn-login">Регистрация</a>
        <?php endif ?>
    </div>
</header>
