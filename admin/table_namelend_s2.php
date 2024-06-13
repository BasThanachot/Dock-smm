<?php
if (isset($_GET['id']) && $_GET['act'] == 'nl_s2') {

  //single row query แสดงแค่ 1 รายการ
  $stmtTableDetail = $condb->prepare("SELECT * FROM tbl_table WHERE id=?");
  $stmtTableDetail->execute([$_GET['id']]);
  $row = $stmtTableDetail->fetch(PDO::FETCH_ASSOC);

  //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
  // if($stmtTableDetail->rowCount() < 1){
  //     header('Location: index.php');
  //     exit();
  // }
}
?>

<!-- Include SweetAlert CSS and JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>:: ฟอร์มบันทึกคืนทรัพย์สิน ::</h1>
        </div>         
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-body">
            <div class="card card-primary">
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">

                  <h5>::รายละเอียดทรัพย์สิน::</h5>                  
                  <h6>เลขทะเบียนครุภัณฑ์ : <?php echo $row['no'];?> </h6>
                  <h6>S/N : <?php echo $row['sn'];?></h6> 
                  <h6>ประเภท : <?php echo $row['type_group'];?> <br>
                  <h6>ลักษณะ/คุณสมบัติ : <?php echo $row['detail'];?></h6>
                  <h6>สถานะ : <?php echo $row['status'];?></h6>
                  <br> <br>
                  
                  <div style="text-align:center">
                  <h4 style="color:red;"> :: รายละเอียด ยืม/ใช้งาน ::</h4> 
                            
                  <div class="form-group row">
                    <label class="col-sm-2">ว/ด/ป คืน</label>
                    <div class="col-sm-2">
                          <input type="date" name="date_night" class="form-control"  required placeholder="ว/ด/ป คืน">
                    </div>                      
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">ชื่อผู้คืน</label>
                    <div class="col-sm-2">
                          <input type="text" name="name_return" class="form-control" required placeholder="ชื่อผู้คืน">
                    </div>                      
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">หน่วยที่ใช้งาน</label>
                    <div class="col-sm-2">
                          <input type="text" name="agen_lend" class="form-control" value="<?php echo $row['agen_lend'];?>" disabled>
                    </div>                      
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">ชื่อผู้ใช้งาน</label>
                    <div class="col-sm-2">
                          <input type="text" name="name_lend" class="form-control" value="<?php echo $row['name_lend'];?>" disabled>
                    </div>                      
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">ว/ด/ป ที่ยืม</label>
                    <div class="col-sm-2">
                          <input type="date" name="date_lend" class="form-control" value="<?php echo $row['date_lend'];?>" disabled>
                    </div>                      
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">โทร</label>
                    <div class="col-sm-2">
                          <input type="text" name="tel_lend" class="form-control" value="<?php echo $row['tel_lend'];?>" disabled>
                    </div>                      
                  </div>
                    
                  <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-4">
                      <input type="hidden" name="id" value="<?php echo $row['id']?>">
                      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>

                      <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <a href="datatable.php?act=s2" class="btn btn-info">กลับหน้าหลัก</a>
                    </div> 
                  </div>  

                  
                   
                  </div>

                </div>
                <!-- /.card-body -->                 
              </form>

              <?php
              if (isset($_POST['id']) 
                  && isset($_POST['date_night'])
                  && isset($_POST['name_return'])) {

                //ประกาศตัวแปรรับค่าจากฟอร์ม
                $id = $_POST['id'];
                $date_night = $_POST['date_night'];
                $name_return = $_POST['name_return'];

                //sql update
                $stmtUpdate = $condb->prepare("UPDATE tbl_table SET 
                  date_night=:date_night,
                  name_return=:name_return
                  WHERE id=:id
                ");
                
                $stmtUpdate->bindParam(':date_night', $date_night);
                $stmtUpdate->bindParam(':name_return', $name_return);
                $stmtUpdate->bindParam(':id', $id);
                // $stmtUpdate->bindParam(':status', "ยืม/ใช้งาน");

                if ($stmtUpdate->execute()) {
                  echo "<script>
                          Swal.fire({
                            title: 'สำเร็จ!',
                            text: 'อัพเดทข้อมูลเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง'
                          });
                        </script>";
                } else {
                  echo "<script>
                          Swal.fire({
                            title: 'ผิดพลาด!',
                            text: 'ไม่สามารถอัพเดทข้อมูลได้',
                            icon: 'error',
                            confirmButtonText: 'ตกลง'
                          });
                        </script>";
                }
              }
              ?>
                  
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.col-->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
