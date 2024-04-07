<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <!-- <link rel="stylesheet" href="../assets/css/styles.min.css" /> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<style>
    .brand-logo {
        background-color: #000000;
    }

    .app-header {
        background-color: #3C8DBC;
    }

    .logo-dashboard {
        width: 70px;
        object-fit: contain;
        padding: 5px;
    }

    .sidebar-nav {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    /* #sidebarnav i{
        display: none !important;
    } */
</style>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img class="logo-dashboard p-2" src="../assets/images/logos/affy-logo.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('employee') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Crates</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('employee/add-customer') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-pencil"></i>
                                </span>
                                <span class="hide-menu">Customer Form</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('employee/add-dealer') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-pencil"></i>
                                </span>
                                <span class="hide-menu">Dealer Form</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Reports</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('employee/customer-reports') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Customer Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('employee/dealer-reports') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Dealer Reports</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-list-check fs-6"></i>
                                    <p class="mb-0 fs-3">My Task</p>
                                </a> -->
                                        <a href="<?= base_url('employee/profile') ?>"
                                            class="btn btn-outline-success mx-3 mt-2 d-block">Profile</a>
                                        <a href="<?= base_url('employee/login') ?>"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->