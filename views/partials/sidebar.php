<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="../views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Article System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../views/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/profile" class="d-block">User Name</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/login" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Login<?php var_dump($_SESSION['user']['role'])?>
                        </p>
                    </a>
                </li>
                <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/groups" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Groups
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/articles" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Articles
                        </p>
                    </a>
                </li>
                <?php }elseif ($_SESSION['user']['role'] === 'editor') { ?>
                <li class="nav-item">
                    <a href="/articles" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Articles
                        </p>
                    </a>
                </li>
                <?php }?>
            </ul>
        </nav>
    </div>
</aside>