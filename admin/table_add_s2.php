<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มบันทึกยืม/ใช้งาน</h1>
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
                      <label class="col-sm-2">หน่วยที่ใช้งาน</label>
                      <div class="col-sm-4">
                            <input type="text" name="agen_lend" class="form-control" required placeholder="หน่วยที่ใช้งาน">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ชื่อผู้ใช้งาน</label>
                      <div class="col-sm-4">
                            <input type="text" name="name_lend" class="form-control" required placeholder="ชื่อผู้ใช้งาน">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ว/ด/ป ที่ยืม</label>
                      <div class="col-sm-2">
                            <input type="date(d-m-Y)" name="date_lend" class="form-control" required placeholder="ว/ด/ป ที่ยืม">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">โทร</label>
                      <div class="col-sm-4">
                            <input type="text" name="tel_lend" class="form-control" required placeholder="โทร">
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

                    if( isset($_POST['agen_lend']) 
                    && isset($_POST['name_lend']) 
                    && isset($_POST['date_lend'])
                    && isset($_POST['tel_lend']) 
                    ){

                        //echo 'ถูกเงื่อนไขส่งข้อมูลมาได้';
                        //ประกาศตัวแปรรับค่าจากฟอร์ม                       
                        $agen_lend = $_POST['agen_lend'];
                        $name_lend = ($_POST['name_lend']);
                        $date_lend = $_POST['date_lend'];
                        $tel_lend = $_POST['tel_lend'];
                        
                                               
                          //sql insert
                        $stmtInsertTableS2 = $condb->prepare("INSERT INTO tbl_lend 
                        (
                            agen_lend,
                            name_lend,
                            date_lend,
                            tel_lend
                            
                        )

                        VALUES 
                        (
                            :agen_lend,
                            :name_lend,
                            :date_lend,
                            :tel_lend                  
                        )"
                        );

                        //bindParam
                        $stmtInsertTableS2->bindParam(':agen_lend', $agen_lend, PDO::PARAM_STR);
                        $stmtInsertTableS2->bindParam(':name_lend', $name_lend , PDO::PARAM_STR);
                        $stmtInsertTableS2->bindParam(':date_lend', $date_lend , PDO::PARAM_STR);
                        $stmtInsertTableS2->bindParam(':tel_lend', $tel_lend , PDO::PARAM_STR);
                        
                                             
                        $result = $stmtInsertTableS2->execute();

                        $condb = null; //close connect db

                        if($result){
                            echo '<script>
                                 setTimeout(function() {
                                  swal({
                                      title: "บันทึกข้อมูลสำเร็จ",
                                      type: "success"
                                  }, function() {
                                      window.location = "datatable.php?act=s2"; //หน้าที่ต้องการให้กระโดดไป
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

