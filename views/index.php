<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Articles Management System</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
</head>

<body class=" hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
          if ($page == "users") {
            include 'views/pages/users/index.php';
          } elseif ($page == "profile") {
            include 'views/pages/profile/index.php';
          } else if ($page == "groups") {
            include 'views/pages/groups/index.php';
          } else if ($page == "articles") {
            include 'views/pages/articles/index.php';
          } else if ($page == "user_edit") {
            include 'views/pages/users/edit.php';
          }
          ?>

        </div>

    
      </section>
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
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="views/plugins/jszip/jszip.min.js"></script>
    <script src="views/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="views/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="views/dist/js/adminlte.min.js"></script>
    <script src="views/dist/js/demo.js"></script>
</body>

</html>