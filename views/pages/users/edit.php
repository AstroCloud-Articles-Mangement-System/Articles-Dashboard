<!-- Edit form -->
<div class="container w-50">
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
    <div class="card card-primary" style="z-index:5;">
        <div class="card-header">
            <h3 class="card-title">User Edit Form</h3>
        </div>
        <form action="/user" method="post" style="z-index: 5;">
            <input type="hidden" name="user_id" value="<?php echo $user[0]['id']; ?>">
            <div class="card-body row">
                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-alt'></i></span>
                        </div>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="<?php echo $user[0]['user_name']; ?>">
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-check'></i></span>
                        </div>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username" value="<?php echo $user[0]['user_username']; ?>">
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" fdprocessedid="7re2y6" value="<?php echo $user[0]['user_email']; ?>">
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-lock'></i></span>
                        </div>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password" value="">
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-phone'></i></span>
                        </div>
                        <input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $user[0]['user_mobile_number']; ?>">
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-friends'></i></span>
                        </div>
                        <select id="group" name="group" class="form-control">
                            <option value="" hidden>Select User Group</option>
                            <?php foreach ($allGroups as $group) { ?>
                                <option value="<?php echo $group['id']; ?>" <?php if ($user[0]['group_id'] == $group['id']) echo 'selected'; ?>><?php echo $group['group_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="_method" value="PATCH" class="btn btn-info btn-block">Update</button>
            </div>
        </form>
    </div>
</div>