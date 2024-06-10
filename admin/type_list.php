
<?php
//คิวรี่ข้มูลลสมาชิก
 $squeryTy = $condb->prepare("SELECT * FROM tbl_devices_type ORDER BY t_id DESC");
 $squeryTy->execute();
 $rsTy = $squeryTy->fetchAll();

 //print_r($_SESSION);

 //echo '<pre>';
 //$squeryMember->debugDumpParams();
 //exit;
?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>ประเภทครุภัณฑ์

            <a href="type.php?act=add" class="btn btn-primary">+เพิ่ม</a>
            </h3>
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
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr class="table-active">
                    <th width="5%" class="text-center">No.</th>
                    <th width="85%" >ประเภทครุภัณฑ์</th>
                    <th width="5%" class="text-center">แก้ไข</th>
                    <th width="5%" class="text-center">ลบ</th>
                  </tr>
                  </thead>
                  <tbody>  
                    <?php 
                    $i = 1; //Stat namber
                    foreach($rsTy as $row){ ?>               
                  <tr>
                    <td align="center"> <?php echo $i++ ?></td>
                    <td><?=$row['t_name'];?> </td>                   
                    
                    <td align="center">
                      <a href="type.php?t_id=<?=$row['t_id'];?>&act=edit" class="btn btn-warning btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i></a></td>
                    <td align="center">
                      <a href="type.php?t_id=<?=$row['t_id'];?>&act=delete" class="btn btn-danger btn-sm actionButton" data-action="delete" onclick="return confirm('ยืนยันการลลบข้อมูล??');"> <i class="fas fa-trash-alt me-1"></i></a></td>
                </tr>
                    <?php } ?>
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
  <!-- /.content-wrapper -->