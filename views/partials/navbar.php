<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto me-5">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $email = $_SESSION['user']['email'];
                            $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
                            $loggedInUser = User::get_users_by_any_sql($sql)[0];
                            echo '
                            <a class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-user" style="margin-right: 5px;"> </i>
                                ' . $loggedInUser["user_name"] . '
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                            </ul>';
                        } else {
                            echo '<a class="nav-link text-capitalize" href="/login" style="margin-right:25px">Log In</a>';
                        }
                        ?>

                    </li>
                </ul>
            </div>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>

</nav>