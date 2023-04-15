<div class="wrapper" style="z-index: 5;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-bold mt-3">Users DataTable</h2>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <button class="btn btn-info bg-info float-right" data-toggle="modal"
                                        data-target="#addUserModal">
                                        <i class="fas fa-plus mr-2"></i>Add New User
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="user-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Subscription Date</th>
                                        <th>Assigned Group ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php foreach ($allUsers as $user) { ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['user_name']; ?></td>
                                        <td><?php echo $user['user_email']; ?></td>
                                        <td><?php echo $user['user_mobile_number']; ?></td>
                                        <td><?php echo $user['user_username']; ?></td>
                                        <td><?php echo $user['user_password']; ?></td>
                                        <td><?php echo $user['subscription_date']; ?></td>
                                        <td><?php echo $user['group_id']; ?></td>
                                        <td class="d-flex justify-content-around">
                                            <a href="#" class="btn btn-success btn-sm mr-1"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm ml-1"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>