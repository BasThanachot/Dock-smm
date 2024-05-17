<?php
    if(isset($_GET['id']) && $_GET['act'] == 'view'){

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
            <h1>ข้อมูลครุภัณฑ์</h1>
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
                            <input type="text" name="governmentagency" class="form-control" value="<?php echo $row['governmentagency'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หน่วยงาน</label>
                      <div class="col-sm-4">
                            <input type="text" name="agen" class="form-control" value="<?php echo $row['agen'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ประเภท</label>
                      <div class="col-sm-3">
                            <select disabled name="type_group" class="form-control" required>
                              <option value="<?php echo $row['type_group'];?>"> <?php echo $row['type_group'];?> </option>
                              <option disabled>-- เลือกข้อมูล --</option>
                              <option value="เคส"> เคส </option>
                              <option value="จอภาพ"> จอภาพ </option>
                              <option value="เครื่องปริ้น"> เครื่องปริ้น </option>p echo $row['type_group'];?>"> <?php echo $row['type_group'];?> </option>
                              
                            </select>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">เลขทะเบียนครุภัณฑ์</label>
                      <div class="col-sm-4">
                            <input type="text" name="no" class="form-control" value="<?php echo $row['no'];?>"disabled >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ลักษณะ/คุณสมบัติ</label>
                      <div class="col-sm-4">
                            <input type="text" name="detail" class="form-control" value="<?php echo $row['detail'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">รุ่น/แบบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="sn" class="form-control" value="<?php echo $row['sn'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานที่ตั้ง/หน่วยรับผิดชอบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" value="<?php echo $row['location'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">วัน/เดือน/ปี</label>
                      <div class="col-sm-4">
                            <input type="date" name="date" class="form-control" value="<?php echo $row['date'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">วิธีการได้มา</label>
                      <div class="col-sm-4">
                            <input type="text" name="supply" class="form-control" value="<?php echo $row['supply'];?>"disabled >
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ที่เอกสาร</label>
                      <div class="col-sm-4">
                            <input type="text" name="doc" class="form-control" value="<?php echo $row['doc'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ราคาหน่วย/ชุด/กลุ่ม</label>
                      <div class="col-sm-4">
                            <input type="text" name="price" class="form-control" value="<?php echo $row['price'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หลักฐานการจ่าย</label>
                      <div class="col-sm-4">
                            <input type="text" name="evidence" class="form-control" value="<?php echo $row['evidence'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานะ</label>
                      <div class="col-sm-3">
                            <select disabled name="status" class="form-control" required>
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
                            <a href="datatable.php" class="btn btn-primary">ตกลง</a>
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

                  