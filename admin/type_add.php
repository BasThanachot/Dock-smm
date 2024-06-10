<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มเพิ่มประเภทครุภัณฑ์</h1>
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
                            <input type="text" name="t_name" class="form-control" required placeholder="ประเภทครุภัณฑ์">
                      </div>                      
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                            <a href="type.php" class="btn btn-danger">ยกเลิก</a>
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

                    if( isset($_POST['t_name']) 
                    ){

                        //echo 'ถูกเงื่อนไขส่งข้อมูลมาได้';
                        //ประกาศตัวแปรรับค่าจากฟอร์ม                       
                        $t_name = $_POST['t_name'];
                        
                                                
                         //เช็ค Username ซ้ำ
                        //single row query แสดงแค่ 1 รายการ
                        $stmtType = $condb->prepare("SELECT t_name FROM tbl_devices_type 
                        WHERE t_name=:t_name
                        ");
                        //bindParam
                        $stmtType->bindParam(':t_name', $t_name, PDO::PARAM_STR);
                        $stmtType->execute();
                        $row = $stmtType->fetch(PDO::FETCH_ASSOC);

                        //นับจำนวนการคิวรี่ Username ซ้ำ
                        if($stmtType->rowCount() == 1){
                          echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "ประเภทครุภัณฑ์ ซ้ำ!!!",
                                text: "กรุณาเพิ่มข้อมูลใหม่อีกครั้ง",
                                type: "error"
                            }, function() {
                                window.location = "type.php?act=add_ty"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                        </script>';
                        }else{
                          //echo 'ไม่มีข้อมูลซ้ำ';
                          //sql insert
                        $stmtType = $condb->prepare("INSERT INTO tbl_devices_type 
                        (                           
                            t_name
                        )
                        VALUES 
                        (
                            :t_name
                        )
                        ");

                        //bindParam

                        $stmtType->bindParam(':t_name', $t_name, PDO::PARAM_STR);
                        $result = $stmtType->execute();                        

                        $condb = null; //close connect db

                       if($result){
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลสำเร็จ",
                                type: "success"
                            }, function() {
                                window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
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
                      } //else if result
                        } //เช็คข้อมูลซ้ำ
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

