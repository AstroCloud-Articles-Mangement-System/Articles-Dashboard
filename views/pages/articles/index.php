<div class="container" style="z-index: 5;">
    <div class="my-5">
        <div class="col-12 d-flex justify-content-end">
            <div class="form-inline">
                <div class="input-group" data-widget="group-search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-info bg-info">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 d-flex flex-wrap justify-content-between" style="z-index: 5;">
        <?php foreach ($allArticles as $article) { ?>
            <div class="d-block groupCard col-md-4 mb-2" style="z-index: 5;">
                <div class="alert card p-0" style="height:530px;">
                    <img class="card-img-top rounded" src="https://image.ibb.co/nNFg4a/polar.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="user-panel group-info mt-1">
                            <div class="info d-flex flex-column">
                                <a href="#" class="d-block text-decoration-none card-title fs-4 groupName"><?php echo $article['article_title']; ?></a>
                                <span class="d-block text-secondary samp">Publishing Date : <?php echo $article['publishing_date']; ?></span>
                            </div>
                        </div>
                        <hr class="border-info">
                        <span class="text-uppercase font-weight-bold font-italic text-secondary">Summary</span>
                        <p class="d-block card-text text-secondary text-truncate--2 "><?php echo $article['article_summary']; ?></p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fa fa-duotone fa-eye text-info"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--Create New Article-->
        <div class="d-block col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:530px;">
                <div class="card-body">
                    <div class="user-panel d-flex justify-content-center align-items-center h-100">
                        <div class="bg-info p-3 img-circle group-info">
                            <a href="/articles/create"><i class="fa fa-plus align-middle" style="font-size:24px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>