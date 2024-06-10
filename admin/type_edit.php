<?php
    if(isset($_GET['t_id']) && $_GET['act'] == 'edit'){

      //single row query แสดงแค่ 1 รายการ
      $stmtTyDetail = $condb->prepare("SELECT * FROM tbl_devices_type WHERE t_id=?");
      $stmtTyDetail->execute([$_GET['t_id']]);
      $row = $stmtTyDetail->fetch(PDO::FETCH_ASSOC);

      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      // if($stmt->rowCount() < 1){
      //     header('Location: index.php');
      //     exit();
      // }
    }//isset
    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มแก้ไขประเภทครุภัณฑ์</h1>
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

                    <div class="form-group row">
                      <label class="col-sm-2">ประเภทครุภัณฑ์</label>
                      <div class="col-sm-4">
                            <input type="text" name="t_name" class="form-control" value="<?php echo $row['t_name'];?>" >
                      </div>                      
                    </div>

                    
                      
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-4">
                        <input type="hidden" name="t_id" value="<?php echo $row['t_id']?>">
                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                            <a href="type.php" class="btn btn-danger">ยกเลิก</a>
                      </div> 
                    </div>  
                       

                  </div>
                  <!-- /.card-body -->                 
                </form>

                <?php
                
                

                if(isset($_POST['t_id']) 
                && isset($_POST['t_name']) 
                
                
                ){
                 

                  //ประกาศตัวแปรรับค่าจากฟอร์ม
                  $t_id = $_POST['t_id'];
                  $t_name = $_POST['t_name'];
                  
                  
                  //sql update
                  $stmtUpdateTy = $condb->prepare("UPDATE tbl_devices_type SET 
                  t_name=:t_name                    
                  WHERE t_id=:t_id
                  ");
                  //bindParam
                  $stmtUpdateTy->bindParam(':t_id', $t_id , PDO::PARAM_INT);
                  $stmtUpdateTy->bindParam(':t_name', $t_name , PDO::PARAM_STR);                  
                  $result = $stmtUpdateTy->execute();

                  $condb = null; //close connect db
                  if($result){
                    echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "แก้ไขข้อมูลสำเร็จ",
                              type: "success"
                          }, function() {
                              window.location = "type.php?t_id='.$t_id.'&act=edit"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
                }else{
                   echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "เกิดข้อผิดพลาด",
                              type: "error"
                          }, function() {
                              window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
                }
                }//isset
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

                  