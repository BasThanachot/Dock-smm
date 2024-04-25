<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มเพิ่มข้อมูลครุภัณฑ์</h1>
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
                            <input type="text" name="governmentagency" class="form-control" required placeholder="ส่วนราชการ">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หน่วยงาน</label>
                      <div class="col-sm-4">
                            <input type="text" name="agen" class="form-control" required placeholder="หน่วยงาน">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ประเภท</label>
                      <div class="col-sm-2">
                            <select name="type_group" class="form-control" required>
                              <option value="">-- เลือกข้อมูล --</option>
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
                            <input type="text" name="no" class="form-control" required placeholder="เลขทะเบียนครุภัณฑ์">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ลักษณะ/คุณสมบัติ</label>
                      <div class="col-sm-4">
                            <textarea name="detail" class="form-control"  required placeholder="ลักษณะ/คุณสมบัติ" id="" cols="70" rows="6"></textarea>
                             
                      </div>                      
                    </div>                                     

                    <div class="form-group row">
                      <label class="col-sm-2">รุ่น/แบบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="sn" class="form-control" required placeholder="S/N">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานที่ตั้ง/หน่วยรับผิดชอบ</label>
                      <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" required placeholder="หน่วยที่ใช้งาน">
                      </div>                      
                    </div>

               
                    <div class="form-group row">
                      <label class="col-sm-2">วัน/เดือน/ปี</label>
                      <div class="col-sm-2">
                            <input type="date" name="date" class="form-control" required placeholder="วัน/เดือน/ปี">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">วิธีการได้มา</label>
                      <div class="col-sm-2">
                            <input type="text" name="supply" class="form-control" required placeholder="วิธีการได้มา">
                      </div>                      
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-2">ที่เอกสาร</label>
                      <div class="col-sm-4">
                            <input type="text" name="doc" class="form-control" required placeholder="ที่เอกสาร">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ราคาหน่วย/ชุด/กลุ่ม</label>
                      <div class="col-sm-2">
                            <input type="text" name="price" class="form-control" required placeholder="ราคา">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">หลักฐานการจ่าย</label>
                      <div class="col-sm-2">
                            <input type="text" name="evidence" class="form-control" required placeholder="หลักฐานการจ่าย">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">สถานะ</label>
                      <div class="col-sm-2">
                            <select name="status" class="form-control" required>
                              <option value=""> -เลือก-</option>
                              <option value="ปกติ"> ปกติ </option>
                              <option value="ไม่ปกติ"> ไม่ปกติ </option>                            
                            </select>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                            <a href="datatable.php" class="btn btn-danger">ยกเลิก</a>
                      </div> 
                    </div>  
                       

                  </div>
                  <!-- /.card-body -->                 
                </form>

                    <?php
                    //เช็ค input ที่ส่งมาจากฟอร์ม
                    //echo '<pre>';
                    //print_r($_POST);
                    //exit;

                    if( isset($_POST['governmentagency']) 
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

                        //echo 'ถูกเงื่อนไขส่งข้อมูลมาได้';
                        //ประกาศตัวแปรรับค่าจากฟอร์ม                       
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
                                               
                          //sql insert
                        $stmtInsertTable = $condb->prepare("INSERT INTO tbl_table 
                        (
                            governmentagency,
                            agen,
                            type_group,
                            no,
                            detail,
                            sn,
                            location,
                            date,
                            supply,
                            doc,
                            price,
                            evidence,
                            status
                        )

                        VALUES 
                        (
                            :governmentagency,
                            :agen,
                            :type_group,
                            :no,
                            :detail,
                            :sn,
                            :location,
                            :date,
                            :supply,
                            :doc,
                            :price,
                            :evidence,
                            :status
                        )"
                        );

                        //bindParam
                        $stmtInsertTable->bindParam(':governmentagency', $governmentagency, PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':agen', $agen , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':type_group', $type_group , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':no', $no , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':detail', $detail , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':sn', $sn , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':location', $location , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':date', $date , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':supply', $supply , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':doc', $doc , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':price', $price , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':evidence', $evidence , PDO::PARAM_STR);
                        $stmtInsertTable->bindParam(':status', $status , PDO::PARAM_STR);
                                             
                        $result = $stmtInsertTable->execute();

                        $condb = null; //close connect db

                        if($result){
                            echo '<script>
                                 setTimeout(function() {
                                  swal({
                                      title: "เพิ่มข้อมูลครุภัณฑ์สำเร็จ",
                                      type: "success"
                                  }, function() {
                                      window.location = "datatable.php"; //หน้าที่ต้องการให้กระโดดไป
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
                    } //isset
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

