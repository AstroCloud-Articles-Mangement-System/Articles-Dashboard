<div class="wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title text-bold">Users DataTable</h2>
              <div class="row mb-2">
                <div class="col-sm-12">
                  <button class="btn btn-info float-right" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus mr-2"></i>Add new User
                  </button>
                </div>

              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Username</th>
                    <th>Group</th>
                    <th>Subscription_Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td>Radwa Hassan</td>
                    <td>radwa@gmail.com</td>
                    <td>010226456</td>
                    <td>Radwa</td>
                    <td>Admin</td>
                    <td>2023-5-10</td>
                    <td class="d-flex justify-content-around">
                      <a href="#" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
