<?php
//คิวรี่ข้มูลลสมาชิก
 $squeryMember = $condb->prepare("SELECT * FROM tbl_member");
 $squeryMember->execute();
 $rsMember = $squeryMember->fetchAll();


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
            <h1>จัดการข้อมูลสมาชิก

            <a href="member.php?act=add" class="btn btn-primary">+ข้อมูล</a>
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
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr class="table-active">
                    <th width="5%" class="text-center">ID</th>
                    <th width="85%" >ชื่อ - สกุล</th>
                    <th width="5%" class="text-center">แก้ไข</th>
                    <th width="5%" class="text-center">ลบ</th>
                  </tr>
                  </thead>
                  <tbody>  
                    <?php foreach($rsMember as $row){ ?>               
                  <tr>
                    <td align="center"><?=$row['id'];?> </td>
                    <td><?=$row['name'].' '.$row['surname'];?> </td>
                    <td align="center"><a href="" class="btn btn-warning btn-sm">แก้ไข</a></td>
                    <td align="center">
                      <a href="member.php?id=<?=$row['id'];?>&act=delete" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล??');">ลบ</a></td>
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