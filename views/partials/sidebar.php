<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="col-12 d-flex flex-column justify-content-center align-items-center">
        <div>
            <img src="../views/dist/img/transparent-logo.gif" alt="Logo" class="img-circle" style="width:150px;">
        </div>
        <div class="col-12 font-weight-light text-center">Article System</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php
    if (isset($_SESSION['user'])) {
      $email = $_SESSION['user']['email'];
      $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
      $loggedInUser = User::get_users_by_any_sql($sql)[0];
      echo '<div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      <img src="../views/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <a href="/profile" class="d-block text-capitalize">' . $loggedInUser['user_name'] . '</a>
      </div>
      </div>';
    }
    ?>

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-4">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Login
                            </p>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') { ?>
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
                    <?php } elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'editor') { ?>
                    <li class="nav-item">
                        <a href="/articles" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Articles
                            </p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</aside>