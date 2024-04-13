  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
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