
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
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                    </div>
                </div>


                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-check'></i></span>
                        </div>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" fdprocessedid="7re2y6">
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-lock'></i></span>
                        </div>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-phone'></i></span>
                        </div>
                        <input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number">
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