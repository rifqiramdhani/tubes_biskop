<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'dashboard') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=dashboard'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">DATA MASTER</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'customer') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=customer'; ?>">
                    <i class="nav-icon fas fa-users"></i> Customer
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'tiket') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=tiket'; ?>">
                    <i class="nav-icon fas fa-ticket-alt"></i> Tiket
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'struk') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=struk'; ?>">
                    <i class="nav-icon fas fa-file-invoice"></i> Struk
                </a>
            </li>


        </ul>
    </nav>
</div>