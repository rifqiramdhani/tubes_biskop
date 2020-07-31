<div class="side-bar">
    <ul>
        <li>
            <a class="<?= $_GET['page'] == '' ? 'active' : '' ?>" href="index.php" title="Beranda">
                <i class="home"></i>
            </a>
            <a class="<?= $_GET['page'] == 'promo' ? 'active' : '' ?>" href="?page=promo" title="Promo">
                <i class="promotion"></i>
            </a>
            <a href="#" data-toggle="modal" data-target="#modal_login" title="Masuk">
                <i class="login"></i>
            </a>
        </li>
    </ul>
</div>