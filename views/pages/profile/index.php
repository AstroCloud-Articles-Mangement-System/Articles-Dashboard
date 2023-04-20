<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/" class="text-info">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content my-4" style="z-index: 1000;">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center gap-2">
            <div class="col-md-4 col-lg-3">
                <!-- Profile Image -->
                <div class="card card-info card-outline" style="z-index: 1000;">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="./views/dist/img/publisher.png"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center text-capitalize">
                            <?php echo $loggedInUser['user_name']; ?></h3>
                        <p class="text-muted text-center">Member in <b
                                class="text-info"><?php echo $user_group_name;?></b> Group
                        </p>
                        <div class="p-4">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                            <p class="text-muted">Alexandria, Egypt</p>
                            <hr class="bg-secondary">
                            <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                            <p class="text-muted"><?php echo '0'.$loggedInUser['user_mobile_number']; ?></p>
                            <hr class="bg-secondary">
                            <strong><i class="far fa-file-alt mr-1"></i> Email</strong>
                            <p class="text-muted"><?php echo $loggedInUser['user_email']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-info" style="z-index: 1000;">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Articles</h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <?php if(!empty($user_articles)){
                                foreach ($user_articles as $article) {
                                    echo '<div class="post">
                                    <div class="user-block">
                                        <span class="username m-0">
                                        <h3 class="text-capitalize"><a class="text-info" href="/articles/show?id=' . $article['id'] . '"> ' . $article['article_title'] . '</a></h3>
                                        </span>
                                    </div>
                                    <p>' . $article['article_content'] . '</p>
                                </div>';
                                }
                            }else{
                                echo '<div class="post">No Articles Published Yet!</div>';
                            }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>