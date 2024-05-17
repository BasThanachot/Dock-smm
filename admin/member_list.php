
<?php
//คิวรี่ข้มูลลสมาชิก
 $squeryMember = $condb->prepare("SELECT * FROM tbl_member ORDER BY id DESC");
 $squeryMember->execute();
 $rsMember = $squeryMember->fetchAll();

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
            <h3>จัดการข้อมูลบุคลากร

            <a href="member.php?act=add" class="btn btn-primary">+เพิ่มบุคลากร</a>
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
                    <th width="50%" >ชื่อบุคลากร</th>
                    <th width="15%" >ระดับ</th>
                    <th width="15%" >แผนก</th>
                    <th width="5%" class="text-center">รหัส</th>
                    <th width="5%" class="text-center">แก้ไข</th>
                    <th width="5%" class="text-center">ลบ</th>
                  </tr>
                  </thead>
                  <tbody>  
                    <?php 
                    $i = 1; //Stat namber
                    foreach($rsMember as $row){ ?>               
                  <tr>
                    <td align="center"> <?php echo $i++ ?></td>
                    <td><?=$row['name'].' '.$row['surname'];?> </td>
                    <td><?=$row['title_name'];?> </td>
                    <td><?=$row['agency'];?> </td>                   
                    <td align="center">
                      <a href="member.php?id=<?=$row['id'];?>&act=editPwd" class="btn btn-info btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i></a></td>
                    <td align="center">
                      <a href="member.php?id=<?=$row['id'];?>&act=edit" class="btn btn-warning btn-sm actionButton" data-action="edit">
                            <i class="fas fa-edit me-1"></i></a></td>
                    <td align="center">
                      <a href="member.php?id=<?=$row['id'];?>&act=delete" class="btn btn-danger btn-sm actionButton" data-action="delete" onclick="return confirm('ยืนยันการลลบข้อมูล??');"> <i class="fas fa-trash-alt me-1"></i></a></td>
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