<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Articles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/" class="text-info">Home</a></li>
                    <li class="breadcrumb-item active">All Articles</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container" style="z-index: 5;">
    <?php
    if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != "") {
        echo '<div id="alert-success" class="alert alert-success" role="alert">';
        echo $_SESSION['success_message'];
        echo '</div>';
        unset($_SESSION['success_message']);
    }
    
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
        echo '<div id="alert-danger" class="alert alert-danger" role="alert">';
        echo '<ul>';
        foreach ($_SESSION['error_message'] as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <div class="my-5 d-flex flex-wrap justify-content-center" style="z-index: 5;">
        <?php foreach ($allArticles as $article) { ?>
        <div class="d-block groupCard col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:450px;">
                <div style="height:200px;">
                    <img class="card-img-top rounded" src="<?php echo (__imgUrl__.$article['article_image']); ?>"
                        alt="Card image cap" style="z-index: 10000;height: 100%; width: 100%;object-fit:cover;object-position:50% 50%; display: block;">
                </div>
                <div class="card-body">
                    <div class="user-panel group-info mt-1">
                        <div class="info d-flex flex-column">
                            <a href="/articles/show?id=<?php echo $article['id'] ?>"
                                class="d-block text-decoration-none card-title fs-4 groupName"><?php echo $article['article_title']; ?></a>
                            <span class="d-block text-secondary samp">Publishing Date:
                                <?php echo $article['publishing_date']; ?></span>
                        </div>
                    </div>
                    <hr class="border-info">
                    <span class="text-uppercase font-weight-bold font-italic text-secondary">Summary</span>
                    <p class="d-block card-text text-secondary text-truncate--2">
                        <?php echo $article['article_summary']; ?>...</p>
                </div>
                <div class="card-footer bg-transparent">
                    <form method="post" action="/articles/delete?id=<?php echo $article['id']; ?>"
                        style="display: inline-block;">
                        <button class="btn btn-navbar" type="button" data-toggle="modal"
                            data-target="#deleteArticleModel" onclick="ArticledeletemodalShow(event)">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                    <a href="/articles/show?id=<?php echo $article['id'] ?>" class="btn btn-navbar" type="button">
                        <i class="fa fa-duotone fa-eye text-info"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--Create New Article-->
        <div class="d-block col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:450px;">
                <div class="card-body">
                    <div class="user-panel d-flex justify-content-center align-items-center h-100">
                        <div class="bg-info p-3 img-circle group-info">
                            <a href="/articles/create"><i class="fa fa-plus align-middle"
                                    style="font-size:24px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteArticleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="bi bi-exclamation-triangle" style="color: #e74c3c;margin-right:5px;"></i>Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are You Sure to Delete this Article?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-article">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
function ArticledeletemodalShow(event) {
    let deleteBtnModal = document.querySelector("#delete-article");
    deleteBtnModal.onclick = function() {
        event.target.closest("form").submit();
    }
}
setTimeout(() => {
    const sucess = document.getElementById('alert-success');
    sucess.style.display = 'none';
}, 6000);
</script>