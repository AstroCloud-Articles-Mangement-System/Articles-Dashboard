<div class="container" style="z-index: 100;">
    <?php
    if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != "") {
        echo '<div id="alert-success" class="alert alert-success" role="alert">';
        echo $_SESSION['success_message'];
        echo '</div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
        echo '<div id="alert-danger" class="alert alert-danger" role="alert">';
        echo $_SESSION['error_message'];
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="my-5" style="z-index: 100;">
        <div class="col-12 d-flex justify-content-end">
            <div class="form-inline">
                <form class='col-12' method="post">
                    <div class="input-group" data-widget="group-search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            name="searchOnGroup" id="searchOnGroup">
                        <div class="input-group-append">
                            <button class="btn btn-info bg-info" type="submit">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="my-5 d-flex flex-wrap justify-content-between">
        <?php foreach ($allGroups as $group) { ?>
        <div class=" d-block groupCard col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:240px;">
                <div class=" card-body">
                    <div class="user-panel group-info d-flex mt-1">
                        <div class=" image">
                            <img src=" views/dist/img/group.png" class="img-circle elevation-2" alt="group Icon">
                        </div>
                        <div class="info">
                            <a href="/users?group_id=<?php echo $group['id']; ?>"
                                class="d-block text-decoration-none card-title mb-2 fs-4 groupName"><?php echo $group['group_name']; ?></a>
                        </div>
                    </div>
                    <hr class="border-info">
                    <p class="card-text text-secondary"><?php echo $group['group_description']; ?></p>
                </div>
                <div class="card-footer bg-transparent">
                    <?php
                        if (($group['group_name'] != 'Admins') && ($group['group_name'] != 'Editors')) { ?>
                    <form method="post" action="/groups/delete?id=<?php echo $group['id']; ?>"
                        style="display: inline-block;">
                        <button class="btn" type="button" data-toggle="modal" data-target="#deleteGroupModel"
                            onclick="GroupdeletemodalShow(event)">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                    <?php
                        }
                        ?>
                    <a href="/groups/edit?id=<?php echo $group['id']; ?>">
                        <i class=" fas fa-edit text-info ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--Create New Group-->
        <div class="d-block col-md-4 mb-2" style="z-index: 5;">
            <div class="alert card p-0" style="height:240px;">
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


<!-- Modal -->
<div class="modal fade" id="deleteGroupModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                <h5>Are You Sure to Delete this Group?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-group">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
function GroupdeletemodalShow(event) {
    let deleteBtnModal = document.querySelector("#delete-group");
    deleteBtnModal.onclick = function() {
        event.target.closest("form").submit();
    }
}
setTimeout(() => {
    const sucess = document.getElementById('alert-success');
    sucess.style.display = 'none';
}, 6000);
</script>