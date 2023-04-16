<!-- Create form -->
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
    <div class="card card-primary" style="z-index: 1000;">
        <div class="card-header">
            <h3 class="card-title">User Create Form</h3>
        </div>
        <form action="/users" method="post" id="vaildate_user_form" data-form-type="create">
            <div class="card-body row">
                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-alt'></i></span>
                        </div>
                        <input type="text" id="name" name="name" class="form-control vaildate_input" placeholder="Full Name" required>
                        <div class="alert alert-danger  px-3 py-2 mt-2 d-none" role="alert" data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            name must be and contain 5 - 20 characters only
                        </div>
                    </div>

                </div>

                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-check'></i></span>
                        </div>
                        <input type="text" id="user_name" name="user_name" class="form-control vaildate_input" placeholder="Username" required>
                        <div class="alert alert-danger  px-3 py-2 mt-2 d-none" role="alert" data-mdb-color="warning" id="user_name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Username must be and contain 5 - 20 characters
                        </div>
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control vaildate_input" id="email" name="email" placeholder="example@gmail.com" fdprocessedid="7re2y6" required>
                        <div class="alert alert-danger  px-3 py-2 mt-2 d-none" role="alert" data-mdb-color="warning" id="password-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Invalid email address e.g xxx@yyy.zzz
                        </div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-phone'></i></span>
                        </div>
                        <input type="phone" id="phone" name="phone" class="form-control vaildate_input" placeholder="Phone Number" required>
                        <div class="alert alert-danger px-3 py-2 mt-2 d-none w-100" role="alert" data-mdb-color="warning" id="password-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Invalid phone number
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-lock'></i></span>
                        </div>
                        <input type="password" id="user_password" name="user_password" class="form-control vaildate_input" placeholder="Password" required>
                        <div class="alert alert-dark border-secondary px-3 py-2 mt-2 d-none col-12" role="alert" data-mdb-color="warning" id="password-alert" style="font-size: 12px;">
                            <ul class="list-unstyled mb-0">
                                <li class="leng text-danger">
                                    <i class="bi bi-x-lg me-1"></i>
                                    Your password must have at least 8 chars.
                                </li>
                                <li class="big-letter text-danger">
                                    <i class="bi bi-x-lg me-1"></i>
                                    Your password must have at least 1 captial char.
                                </li>
                                <li class="num text-danger">
                                    <i class="bi bi-x-lg  me-1"></i>
                                    Your password must have at least 1 number.
                                </li>
                                <li class="special-char text-danger">
                                    <i class="bi bi-x-lg me-1"></i>
                                    Your password must have at least 1 special char [@ ! # % & _].
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-friends'></i></span>
                        </div>
                        <select id="group" name="group" class="form-control" required >
                            <option value="">Select User Group</option>
                            <?php foreach ($allGroups as $group) { ?>
                                <option value="<?php echo $group['id']; ?>"><?php echo $group['group_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info btn-block create-btn">Create</button>
            </div>
        </form>
    </div>
</div>

<script src="/views/dist/js/user_vaildation.js"></script>