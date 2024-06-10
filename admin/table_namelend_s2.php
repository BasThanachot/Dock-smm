<?php
    if(isset($_GET['id']) && $_GET['act'] == 'nl_s2'){

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
                    <h6>ลักษณะ/คุณสมบัติ : <?php echo $row['detail'];?>
                    <h6>สถานะ : <?php echo $row['status'];?>
                    <br> <br>
                    
                    <div style="text-align:center">
                    <h4 style="color:red;"> :: รายละเอียด ยืม/ใช้งาน ::</h4> 
                              
                    <div class="form-group row">
                      <label class="col-sm-2">ว/ด/ป คืน</label>
                      <div class="col-sm-2">
                            <input type="date" name="date_lend" class="form-control" >
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
                            <input type="date(d-m-Y)" name="date_lend" class="form-control" value="<?php echo $row['date_lend'];?>" disabled>
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
                            <a href="datatable.php?act=s2" class="btn btn-primary">บันทึกข้อมูล</a>
                      </div> 
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
                    && isset($_POST['status'])
                    &&isset($_POST['agen_lend']) 
                    && isset($_POST['name_lend']) 
                    && isset($_POST['date_lend'])
                    && isset($_POST['tel_lend'])
                    ){
                 

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
                  $agen_lend = $_POST['agen_lend'];
                  $name_lend = $_POST['name_lend'];
                  $date_lend = $_POST['date_lend'];
                  $tel_lend = $_POST['tel_lend'];
                  

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
                  status=:status,
                  agen_lend:agen_lend,
                  name_lend:name_lend,
                  date_lend:date_lend,
                  tel_lend:tel_lend,
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
