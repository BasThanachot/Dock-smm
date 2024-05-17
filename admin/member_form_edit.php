<?php
    if(isset($_GET['id']) && $_GET['act'] == 'edit'){

      //single row query แสดงแค่ 1 รายการ
      $stmtMemberDetail = $condb->prepare("SELECT * FROM tbl_member WHERE id=?");
      $stmtMemberDetail->execute([$_GET['id']]);
      $row = $stmtMemberDetail->fetch(PDO::FETCH_ASSOC);

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
            <h1>ฟอร์มแก้ไขข้อมูลสมาชิก</h1>
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
                      <label class="col-sm-2">Username</label>
                      <div class="col-sm-4">
                            <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" disabled>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ระดับผู้ใช้งาน</label>
                      <div class="col-sm-3">
                            <select name="title_name" class="form-control" required>
                              <option value="<?php echo $row['title_name'];?>"> <?php echo $row['title_name'];?> </option>
                              <option disabled>-- เลือกข้อมูล --</option>
                              <option value="Admin"> Admin </option>
                              <option value="Users"> Users </option>
                            </select>
                      </div>                      
                    </div>
                   
                    <div class="form-group row">
                      <label class="col-sm-2">หน่วยงาน</label>
                      <div class="col-sm-3">
                            <select name="agency" class="form-control" required>
                              <option value="<?php echo $row['agency'];?>"> <?php echo $row['agency'];?> </option>
                              <option disabled>-- เลือกข้อมูล --</option>value="<?php echo $row['agency'];?>>
                              <option value="แผนกนิรภัย"> แผนกนิรภัยการช่าง </option>
                              <option value="แผนกจัดหน่วยงาน"> แผนกจัดหน่วยงาน</option>
                              <option value="แผนกจัดการ">แผนกจัดการ </option>
                              <option value="แผนกกรรมวิธีฯ">แผนกกรรมวิธีฯ </option>                                                     
                              <option value="แผนกธุรการ กจก."> แผนกธุรการ กจก. </option>
                            </select>
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">ชื่อ</label>
                      <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" required placeholder="ชื่อ" value="<?php echo $row['name'];?>">
                      </div>                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">นามสกุล</label>
                      <div class="col-sm-4">
                            <input type="text" name="surname" class="form-control" required placeholder="นามสกุล" value="<?php echo $row['surname'];?>">
                      </div>                      
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-4">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                            <a href="member.php" class="btn btn-danger">ยกเลิก</a>
                      </div> 
                    </div>  
                       

                  </div>
                  <!-- /.card-body -->                 
                </form>

                <?php
                
                

                if(isset($_POST['id']) 
                && isset($_POST['name']) 
                &&  isset($_POST['surname'])
                &&  isset($_POST['title_name'])
                &&  isset($_POST['agency'])
                
                ){
                 

                  //ประกาศตัวแปรรับค่าจากฟอร์ม
                  $id = $_POST['id'];
                  $title_name = $_POST['title_name'];
                  $agency = $_POST['agency'];
                  $name = $_POST['name'];
                  $surname = $_POST['surname'];
                  
                  //sql update
                  $stmtUpdate = $condb->prepare("UPDATE tbl_member SET 
                  title_name=:title_name,
                  agency=:agency,
                  name=:name, 
                  surname=:surname                   
                  WHERE id=:id
                  ");
                  //bindParam
                  $stmtUpdate->bindParam(':id', $id , PDO::PARAM_INT);
                  $stmtUpdate->bindParam(':name', $name , PDO::PARAM_STR);
                  $stmtUpdate->bindParam(':surname', $surname , PDO::PARAM_STR);
                  $stmtUpdate->bindParam(':title_name', $title_name , PDO::PARAM_STR);
                  $stmtUpdate->bindParam(':agency', $agency , PDO::PARAM_STR);
                  $result = $stmtUpdate->execute();

                  $condb = null; //close connect db
                  if($result){
                    echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "แก้ไขข้อมูลสำเร็จ",
                              type: "success"
                          }, function() {
                              window.location = "member.php?id='.$id.'&act=edit"; //หน้าที่ต้องการให้กระโดดไป
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
                              window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
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

                  