<?php
$db = \Config\Database::connect();
$role = $db->table('auth_groups')
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GSG E-LEARNING</div>
    </a>

    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Nav Item - User List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-user"></i>
                <span>User List</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Master Data -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-table"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/tingkatan'); ?>"> <i class="nav-icon fas fa-graduation-cap"></i> Tingkatan</a>
                    <a class="collapse-item" href="<?= base_url('admin/tarif'); ?>"> <i class="fas fa-money-check-alt"></i> Tarif les</a>
                    <a class="collapse-item" href="<?= base_url('admin/materi'); ?>"> <i class="fas fa-book-open"></i> Materi</a>
                    <a class="collapse-item" href="<?= base_url('admin/matpel'); ?>"> <i class="fas fa-book"></i> Mata pelajaran</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Master Pembayaran -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembayaran" aria-expanded="true" aria-controls="collapsePembayaran">
                <i class="far fa-credit-card"></i>
                <span>Pembayaran</span>
            </a>
            <div id="collapsePembayaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">Tingkatan</a>
                    <a class="collapse-item" href="cards.html">Tarif Les</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Master Reporting -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReporting" aria-expanded="true" aria-controls="collapseReporting">
                <i class="fas fa-file-alt"></i>
                <span>Reporting</span>
            </a>
            <div id="collapseReporting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">Tingkatan</a>
                    <a class="collapse-item" href="cards.html">Tarif Les</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php elseif ($role != ('admin')) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            User Profile
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <i class="fas fa-user"></i>
                <span>My Profile</span></a>
        </li>

        <!-- Nav Item - User Management -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>