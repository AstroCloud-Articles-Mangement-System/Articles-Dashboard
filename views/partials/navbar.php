<nav class="main-header navbar stars navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto me-5">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $email = $_SESSION['user']['email'];
                            $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
                            $loggedInUser = User::get_users_by_any_sql($sql)[0];
                            echo '
                            <a class="nav-link text-capitalize" href="/profile">
                            <img src="../views/dist/img/publisher.png" class="nav-icon img-circle mr-2 align-middle" style="width:30px;"/>
                                ' . $loggedInUser["user_name"] . '
                            </a>';
                        } else {
                            echo '<a class="nav-link text-capitalize" href="/login" style="margin-right:25px">LogIn</a>';
                        }
                        ?>

                    </li>
                </ul>
            </div>
        </li>
    </ul>

</nav>