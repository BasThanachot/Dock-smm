<?php 
//คิวรี่ข้อมูลครุภัณฑ์
$squeryTable = $condb->prepare("SELECT * FROM tbl_table");
$squeryTable->execute();
$rsTable = $squeryTable->fetchAll();

?>  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ข้อมูลครุภัณฑ์
              <a href="main_content_table_add.php" class="btn btn-primary">+เพิ่มข้อมูล</a>
            </h1>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="table-active">
                    <th width="5%" class="text-center">No.</th>
                    <th width="25%" >เลขทะเบียนครุภัณฑ์</th>
                    <th width="23%" >S/N</th>
                    <th width="15%" >วัน/เดือน/ปี</th>
                    <th width="12%" >ราคา/ชุด</th>
                    <th width="5%" class="text-center">สถานะ</th>
                    <th width="5%" class="text-center">ดู</th>
                    <th width="5%" class="text-center">แก้ไข</th>
                    <th width="5%" class="text-center">ลบ</th>
                    
                  </tr>
                  </thead>
                  <tbody>  
                    <?php 
                    $i = 1; //Stat namber
                    foreach($rsTable as $row){ ?>     

                  <tr>
                    <td align="center"> <?php echo $i++ ?></td>
                    <td><?=$row['no'];?> </td>
                    <td><?=$row['sn'];?> </td>
                    <td><?=$row['date'];?> </td>
                    <td><?=$row['price'];?> </td>
                    <td><?=$row['status'];?> </td>
                    <td>
                      <button class="btn btn-success btn-sm actionButton" data-action="watch">
                            <i class="fas fa-eye me-1"></i> 
                      </button>
                    </td>

                    <td>
                      <button class="btn btn-warning btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i> 
                      </button>
                    </td>

                    <td>                                                
                        <button class="btn btn-danger btn-sm actionButton" data-action="delete">
                            <i class="fas fa-trash-alt me-1"></i> 
                        </button>
                    </td>

                  </tr>
                  <?php } ?>
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
  <!-- /.content-wrapper -->