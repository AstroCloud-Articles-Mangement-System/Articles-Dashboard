<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../views/dist/img/fav-icon.png">
    <title> Articles Management System</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../views/dist/css/adminlte.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../views/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- DataTables -->
    <link rel="stylesheet" href="../../views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../views/dist/css/adminlte.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../views/dist/css/adminlte.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../views/dist/css/showarticle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php include 'partials/preloader.php'; ?>

        <!-- Navbar -->
        <?php include 'partials/navbar.php'; ?>

        <!-- Main Sidebar Container -->
        <?php include 'partials/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content" style="margin-top: 7.5%">
                <div class="container-fluid">
                    <?php
          switch ($page) {
            case "/":
              include 'views/pages/home/index.php';
              break;
            case "user_edit":
              include 'views/pages/users/edit.php';
              break;
            case "users":
              include 'views/pages/users/index.php';
              break;
            case "profile":
              include 'views/pages/profile/index.php';
              break;
            case "groups":
              include 'views/pages/groups/index.php';
              break;
            case "articles":
              include 'views/pages/articles/index.php';
              break;
            case "group_create":
              include 'views/pages/groups/create.php';
              break;
            case "group_edit":
              include 'views/pages/groups/edit.php';
              break;
            case "user_create":
              include 'views/pages/users/create.php';
              break;
            case "articleCreate":
              include 'views/pages/articles/create.php';
              break;
            case "articleShow":
              include 'views/pages/articles/show.php';
              break;
          }
          ?>
                </div>


            </section>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <!-- Main Footer -->
        <?php include 'partials/footer.php'; ?>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <script src="../../views/plugins/jquery/jquery.min.js"></script>
    <script src="../../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../views/dist/js/adminlte.js"></script>
    <script src="../../views/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../views/plugins/raphael/raphael.min.js"></script>
    <script src="../../views/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../views/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="../../views/plugins/chart.js/Chart.min.js"></script>
    <script src="../../views/dist/js/demo.js"></script>
    <script src="../../views/dist/js/pages/dashboard2.js"></script>
    <script src="../../views/plugins/jquery/jquery.min.js"></script>
    <script src="../../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../views/plugins/jszip/jszip.min.js"></script>
    <script src="../../views/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../views/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="../../views/dist/js/adminlte.min.js"></script>
    <script src="../../views/dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>