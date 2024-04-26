
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ข้อมูลครุภณฑ์</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>แผนก</th>
                    <th>บทบาท</th>
                    <th>จัดการข้อมูล</th>
                  </tr>
                  </thead>
                  <tbody>                 
                  <tr>
                    <td>1</td>
                    <td>กรรมวิธีข้อมูลฯ</td>
                    <td>ผู้ดูแลระบบ (Admin)</td>
                    <td>
                        <button class="btn btn-success btn-sm actionButton" data-action="watch">
                            <i class="fas fa-eye me-1"></i> ดู
                        </button>
                        <button class="btn btn-warning btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i> แก้ไข
                        </button>
                        <button class="btn btn-danger btn-sm actionButton" data-action="delete">
                            <i class="fas fa-trash-alt me-1"></i> ลบ
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ธุรการ กจก.อร.</td>
                    <td>ผู้ใช้งาน (User)</td>
                    <td>
                        <button class="btn btn-success btn-sm actionButton" data-action="watch">
                            <i class="fas fa-eye me-1"></i> ดู
                        </button>
                        <button class="btn btn-warning btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i> แก้ไข
                        </button>
                        <button class="btn btn-danger btn-sm actionButton" data-action="delete">
                            <i class="fas fa-trash-alt me-1"></i> ลบ
                        </button>
                    </td>
                </tr>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ลำดับ</th>
                    <th>แผนก</th>
                    <th>บทบาท</th>
                    <th>จัดการข้อมูล</th>
                  </tr>
                  </tfoot>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & ../assets/plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../assets/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  document.getElementById("addButton").addEventListener("click", function() {
      // Redirect to add page or open modal for adding data
      console.log("Add button clicked");
  });

  
</script>
</body>
</html>
