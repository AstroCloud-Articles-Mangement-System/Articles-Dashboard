<?php
if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != "") {
    echo '<div id="alert-success" class="alert alert-success" role="alert">';
    echo $_SESSION['success_message'];
    echo '</div>';
    unset($_SESSION['success_message']);
} ?>
<div class="container" style="z-index: 100;">
    <div class="my-5" style="z-index: 100;">
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
    <div class="my-5 d-flex flex-wrap justify-content-between">
        <?php foreach ($allGroups as $group) { ?>
            <div class="d-block groupCard col-md-4 mb-2" style="z-index: 5;">
                <div class="alert card p-0" style="height:30vh;">
                    <div class=" card-body">
                        <div class="user-panel group-info d-flex mt-1">
                            <div class=" image">
                                <img src=" views/dist/img/group.png" class="img-circle elevation-2" alt="group Icon">
                            </div>
                            <div class="info">
                                <a href="/users?group_id=<?php echo $group['id']; ?>" class="d-block text-decoration-none card-title mb-2 fs-4 groupName"><?php echo $group['group_name']; ?></a>
                            </div>
                        </div>
                        <hr class="border-info">
                        <p class="card-text text-secondary"><?php echo $group['group_description']; ?></p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                        <a href="/groups/edit?id=<?php echo $group['id']; ?>">
                            <i class=" fas fa-edit text-info ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--Create New Group-->
        <div class="d-block col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:30vh;">
                <div class="card-body">
                    <div class="user-panel d-flex justify-content-center align-items-center h-100">
                        <div class="bg-info p-3 img-circle group-info">
                            <a href="/groups/create"><i class="fa fa-plus align-middle" style="font-size:24px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
    const sucess = document.getElementById('alert-success');
    sucess.style.display = 'none';
}, 3000);
</script>