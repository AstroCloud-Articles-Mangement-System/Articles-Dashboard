
<!-- Registration form -->
<div class="container w-50">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">User Edit Form</h3>
        </div>
        <form action="#" method="post">
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
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" fdprocessedid="7re2y6"  value="<?php echo $user[0]['user_email']; ?>">
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-lock'></i></span>
                        </div>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password"  value="<?php echo $user[0]['user_password']; ?>">
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-phone'></i></span>
                        </div>
                        <input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number"  value="<?php echo $user[0]['user_mobile_number']; ?>">
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-friends'></i></span>
                        </div>
                        <select id="group" name="group" class="form-control">
                            <option value="" hidden>Select User Group</option>
                            <option>Admins</option>
                            <option>Editors</option>
                        </select>
                    </div>
                </div>
              <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
</div>


