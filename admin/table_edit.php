<?php
    if(isset($_GET['id']) && $_GET['act'] == 'edit'){

      //single row query แสดงแค่ 1 รายการ
      $stmtTableDetail = $condb->prepare("SELECT * FROM tbl_table WHERE id=?");
      $stmtTableDetail->execute([$_GET['id']]);
      $row = $stmtTableDetail->fetch(PDO::FETCH_ASSOC);

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
            <h1>ฟอร์มแก้ไขข้อมูลครุภัณฑ์</h1>
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
                      <label class="col-sm-2">ส่วนราชการ</label>
                      <div class="col-sm-4">
                            <input type="text" name="governmentagency" class="form-control" value="<?php echo $row['governmentagency'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หน่วยงาน</label>
                      <div class="col-sm-4">
                            <input type="text" name="agen" class="form-control" value="<?php echo $row['agen'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ประเภท</label>
                      <div class="col-sm-3">
                            <select name="type_group" class="form-control" required>
                              <option value="<?php echo $row['type_group'];?>"> <?php echo $row['type_group'];?> </option>
                              <option disabled>-- เลือกข้อมูล --</option>
                              <option value="เคส"> เคส </option>
                              <option value="จอภาพ"> จอภาพ </option>
                              <option value="เครื่องปริ้น"> เครื่องปริ้น </option>
                              <option value="เครื่องสำรองไฟ"> เครื่องสำรองไฟ </option>
                            </select>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">เลขทะเบียนครุภัณฑ์</label>
                      <div class="col-sm-4">
                            <input type="text" name="no" class="form-control" value="<?php echo $row['no'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ลักษณะ/คุณสมบัติ</label>
                      <div class="col-sm-4">
                            <input type="text" name="detail" class="form-control" value="<?php echo $row['detail'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">รุ่น/แบบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="sn" class="form-control" value="<?php echo $row['sn'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานที่ตั้ง/หน่วยรับผิดชอบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" value="<?php echo $row['location'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">วัน/เดือน/ปี</label>
                      <div class="col-sm-4">
                            <input type="date" name="date" class="form-control" value="<?php echo $row['date'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">วิธีการได้มา</label>
                      <div class="col-sm-4">
                            <input type="text" name="supply" class="form-control" value="<?php echo $row['supply'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ที่เอกสาร</label>
                      <div class="col-sm-4">
                            <input type="text" name="doc" class="form-control" value="<?php echo $row['doc'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ราคาหน่วย/ชุด/กลุ่ม</label>
                      <div class="col-sm-4">
                            <input type="text" name="price" class="form-control" value="<?php echo $row['price'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หลักฐานการจ่าย</label>
                      <div class="col-sm-4">
                            <input type="text" name="evidence" class="form-control" value="<?php echo $row['evidence'];?>" >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานะ</label>
                      <div class="col-sm-3">
                            <select name="status" class="form-control" required>
                              <option value="<?php echo $row['status'];?>"> <?php echo $row['status'];?> </option>
                              <option disabled>-- เลือกข้อมูล --</option>
                              <option value="ปกติ"> ปกติ </option>
                              <option value="ไม่ปกติ"> ไม่ปกติ </option>  
                            </select>
                      </div>                      
                    </div>                   
                      
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-4">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                            <a href="datatable.php" class="btn btn-danger">ยกเลิก</a>
                      </div> 
                    </div>  
                       

                  </div>
                  <!-- /.card-body -->                 
                </form>

                <?php
                
                

                 if( isset($_POST['id']) 
                    && isset($_POST['governmentagency'])
                    && isset($_POST['agen']) 
                    && isset($_POST['type_group'])
                    && isset($_POST['no']) 
                    && isset($_POST['detail']) 
                    && isset($_POST['sn'])
                    && isset($_POST['location']) 
                    && isset($_POST['date']) 
                    && isset($_POST['supply'])
                    && isset($_POST['doc']) 
                    && isset($_POST['price']) 
                    && isset($_POST['evidence']) 
                    && isset($_POST['status'])){
                 

                  //ประกาศตัวแปรรับค่าจากฟอร์ม
                  $id = $_POST['id'];
                  $governmentagency = $_POST['governmentagency'];
                  $agen = ($_POST['agen']);
                  $type_group = $_POST['type_group'];
                  $no = $_POST['no'];
                  $detail = $_POST['detail'];
                  $sn = $_POST['sn'];
                  $location = $_POST['location'];
                  $date = $_POST['date'];
                  $supply = $_POST['supply'];
                  $doc = $_POST['doc'];
                  $price = $_POST['price'];
                  $evidence = $_POST['evidence'];
                  $status = $_POST['status'];

                  //sql update
                  $stmtUpdate = $condb->prepare("UPDATE tbl_table SET 
                  governmentagency=:governmentagency, 
                  agen=:agen,
                  type_group=:type_group,
                  no=:no,
                  detail=:detail,
                  sn=:sn,
                  location=:location,
                  date=:date,
                  supply=:supply,
                  doc=:doc,
                  price=:price,
                  evidence=:evidence,
                  status=:status
                  WHERE id=:id
                  ");
                  //bindParam
                    $stmtUpdate->bindParam(':id', $id , PDO::PARAM_INT);
                    $stmtUpdate->bindParam(':governmentagency', $governmentagency, PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':agen', $agen , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':type_group', $type_group , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':no', $no , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':detail', $detail , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':sn', $sn , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':location', $location , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':date', $date , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':supply', $supply , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':doc', $doc , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':price', $price , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':evidence', $evidence , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':status', $status , PDO::PARAM_STR);
                                          
                    $result = $stmtUpdate->execute();

                  $condb = null; //close connect db
                  if($result){
                    echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "แก้ไขข้อมูลสำเร็จ",
                              type: "success"
                          }, function() {
                              window.location = "datatable.php?id='.$id.'&act=edit"; //หน้าที่ต้องการให้กระโดดไป
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
                              window.location = "datatable.php"; //หน้าที่ต้องการให้กระโดดไป
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

                  