<div class="wrapper col-md-10 mx-auto" style="z-index: 1000; padding: 0; ">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text font-weight-bolder">Users</span>
                    <span class="info-box-number">
                     <?php echo count($users)?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text font-weight-bolder">Groups</span>
                    <span class="info-box-number"><?php echo count($groups) ?></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><ion-icon name="newspaper-outline" size="large"></ion-icon></span>

                <div class="info-box-content">
                    <span class="info-box-text font-weight-bolder">Articles</span>
                    <span class="info-box-number"><?php echo count($articles) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper card card-primary col-md-10 mx-auto" style="z-index: 1000; padding: 0; ">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto ">
                    <div>
                        <canvas id="myChart" class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
require 'views/pages/home/chart.php';
?>