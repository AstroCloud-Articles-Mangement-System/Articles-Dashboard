<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../views/dist/img/fav-icon.png">
    <title> Articles Management System | LogIn</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <style>
    strong {
        margin-right: 260px !important;
    }
    </style>
</head>

<body
    class="stars hold-transition login-page dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper" style="z-index: 5;">
        <div class="login-box" style="margin-top:40%">
            <?php
          if (isset($_SESSION['_flash']['errors'])) {
            echo '<div id="alert-danger" class="alert alert-danger" role="alert">';
            echo '<ul>';
            foreach($_SESSION['_flash']['errors'] as $error){
              echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            unset($_SESSION['_flash']['errors']);
          
          }
          ?>
            <div class="card" style="z-index: 5;">
                <div class="card-body login-card-body d-flex flex-column align-items-center">
                    <div class="mb-3">
                        <img src="../views/dist/img/logo.gif" alt="Logo" class="img-circle" style="width:100px;">
                    </div>
                    <div class="mb-3">
                        <p class="login-box-msg text-bold" style=" letter-spacing:6px;">SIGN IN</p>
                        <form action="/login" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="icheck-primary mb-4">
                                        <input type="checkbox" id="remember_me" name="remember_me">
                                        <label for="remember_me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info bg-info btn-block">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <?php include 'views/partials/footer.php'; ?>
        </section>


        <!-- jQuery -->
        <script src="views/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="views/dist/js/adminlte.min.js"></script>
</body>

</html>