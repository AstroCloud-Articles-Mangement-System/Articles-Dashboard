<!-- Create form -->
<div class="container" style="width:35% ;">
    <?php
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
        echo '<div id="alert-danger" class="alert alert-danger" role="alert">';
        echo '<ul></ul>';
        foreach ($_SESSION['error_message'] as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="card card-info" style="z-index: 1000;">
        <div class="card-header bg-info">
            <h3 class="card-title">Create New Group</h3>
        </div>
        <form action="/groups" method="POST" id="vaildate_group_form" data-form-type="create">
            <div class="card-body row">
                <div class="form-group col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-alt'></i></span>
                        </div>
                        <input type="text" id="group_name" name="group_name" class="form-control vaildate_input"
                            placeholder="Group Name" required>
                        <div class="alert alert-danger  px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Group Name must be and contain 5 - 20 characters, -, _ and white space only
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="form-outline ">
                        <div class="mb-2" style="font-size: 18px;letter-spacing:1.5px;">Description</div>
                        <textarea class="form-control vaildate_input" id="group_desc" name="group_desc"
                            placeholder="Group Description" rows="6"></textarea>
                        <div class="alert alert-danger  px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="user_name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Only letters, numbers and -_.,!?;:()\'\" allowed and must be less than 1500 letter
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info bg-info btn-block create-btn">Create</button>
            </div>
        </form>
    </div>
</div>
<script src="/views/dist/js/group_vaildation.js"></script>