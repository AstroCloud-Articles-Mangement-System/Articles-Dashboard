<aside class="stars main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class=" col-12 d-flex flex-column justify-content-center align-items-center my-3">
        <div class="mb-3">
            <img src="../views/dist/img/logo.gif" alt="Logo" class="img-circle" style="width:100px;">
        </div>
        <div class="col-12 font-weight-light text-center"
            style="font-family: 'Brush Script MT', cursive; font-size:2.3rem">
            AstroCloud</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar my-2" style="height: 68vh;border-bottom:solid thin rgb(96, 96, 96);">
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
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') { ?>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <img src="../views/dist/img/icons/user-icon.png" class="nav-icon img-circle">
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/groups" class="nav-link">
                        <img src="../views/dist/img/icons/group-icon.png" class="nav-icon img-circle">
                        <p>
                            Groups
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/articles" class="nav-link">
                        <img src="../views/dist/img/icons/article-icon.png" class="nav-icon img-circle">
                        <p>
                            Articles
                        </p>
                    </a>
                </li>
                <?php } elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'editor') { ?>
                <li class="nav-item">
                    <a href="/articles" class="nav-link">
                        <img src="../views/dist/img/icons/article-icon.png" class="nav-icon img-circle">
                        <p>
                            Articles
                        </p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <!--Logout-->
    <a class="nav-link mt-2 text-white" href="/logout">
        <img src="../views/dist/img/icons/logout-icon.png" class="nav-icon img-circle" width="30px">
        <span class="ml-2">LogOut</span>
    </a>
</aside>