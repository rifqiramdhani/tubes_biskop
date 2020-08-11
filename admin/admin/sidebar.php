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
                <a class="nav-link <?php if ($page == 'admin') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=admin'; ?>">
                    <i class="nav-icon fas fa-users"></i> Admin
                </a>
            </li>
      
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'film') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=film'; ?>">
                    <i class="nav-icon fas fa-film"></i> Film
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'paket-makanan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=paket-makanan'; ?>">
                    <i class="nav-icon fas fa-utensils"></i> Paket Makanan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'studio') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=studio'; ?>">
                    <i class="nav-icon fas fa-door-open"></i> Studio
                </a>
            </li>

            <li class="nav-title">DATA JADWAL</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'jadwal') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=jadwal'; ?>">
                    <i class="nav-icon fas fa-clock"></i> Jadwal
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'detail-jadwal') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=detail-jadwal'; ?>">
                    <i class="nav-icon fas fa-calendar-alt"></i> Detail Jadwal
                </a>
            </li>

        </ul>
    </nav>
</div>