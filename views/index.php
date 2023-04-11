<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Articles Management System </title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
</head>

<body class=" hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php include 'partials/preloader.php';?>

        <!-- Navbar -->
        <?php include 'partials/navbar.php';?>

        <!-- Main Sidebar Container -->
        <?php include 'partials/sidebar.php';?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content" style="margin-top: 7.5%">
                <div class="container-fluid">
                    <?php include 'pages/groups/index.php';?>
                </div>
            </section>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <!-- Main Footer -->
        <?php include 'partials/footer.php';?>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="views/dist/js/adminlte.js"></script>
    <script src="views/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="views/plugins/raphael/raphael.min.js"></script>
    <script src="views/views/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="views/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="views/plugins/chart.js/Chart.min.js"></script>
    <script src="views/dist/js/demo.js"></script>
    <script src="views/dist/js/pages/dashboard2.js"></script>
</body>

</html>